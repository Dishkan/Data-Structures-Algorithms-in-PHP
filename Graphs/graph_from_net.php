<?php

/**
 * Undirected graph implementation.
 */
class Graph
{
  /**
   * Adds an undirected edge between $u and $v in the graph.
   * 
   * $u,$v can be anything.
   *
   * Edge (u,v) and (v,u) are the same.
   * 
   * $data is the data to be associated with this edge.
   * If the edge (u,v) already exists, nothing will happen (the
   * new data will not be assigned).
   */
  public function add_edge($u,$v,$data=null)
  {
    assert($this->sanity_check());
    assert($u != $v);

    if ($this->has_edge($u,$v))
      return;

    //If u or v don't exist, create them.
    if (!$this->has_vertex($u))
      $this->add_vertex($u);
    if (!$this->has_vertex($v))
      $this->add_vertex($v);

    //Some sanity.
    assert(array_key_exists($u,$this->adjacency_list));
    assert(array_key_exists($v,$this->adjacency_list));

    //Associate (u,v) with data.
    $this->adjacency_list[$u][$v] = $data;
    //Associate (v,u) with data.
    $this->adjacency_list[$v][$u] = $data;

    //We just added two edges
    $this->edge_count += 2;

    assert($this->has_edge($u,$v));

    assert($this->sanity_check());
  }

  public function has_edge($u,$v)
  {
    assert($this->sanity_check());

    //If u or v do not exist, they surely do not make up an edge.
    if (!$this->has_vertex($u))
      return false;
    if (!$this->has_vertex($v))
      return false;


    //some extra sanity.
    assert(array_key_exists($u,$this->adjacency_list));
    assert(array_key_exists($v,$this->adjacency_list));

    //This is the return value; if v is a neighbor of u, then its true.
    $result = array_key_exists($v,$this->adjacency_list[$u]);

    //Make sure that iff v is a neighbor of u, then u is a neighbor of v
    assert($result == array_key_exists($u,$this->adjacency_list[$v]));

    return $result;
  }

  /**
   * Remove (u,v) and return data.
   */
  public function remove_edge($u,$v)
  {
    assert($this->sanity_check());

    if (!$this->has_edge($u,$v))
      return null;

    assert(array_key_exists($u,$this->adjacency_list));
    assert(array_key_exists($v,$this->adjacency_list));
    assert(array_key_exists($v,$this->adjacency_list[$u]));
    assert(array_key_exists($u,$this->adjacency_list[$v]));

    //remember data.
    $data = $this->adjacency_list[$u][$v];

    unset($this->adjacency_list[$u][$v]);
    unset($this->adjacency_list[$v][$u]);

    //We just removed two edges.
    $this->edge_count -= 2;

    assert($this->sanity_check());

    return $data;
  }

  //Return data associated with (u,v)
  public function get_edge_data($u,$v)
  {
    assert($this->sanity_check());

    //some sanity.
    assert(array_key_exists($u,$this->adjacency_list));
    assert(array_key_exists($v,$this->adjacency_list[$u]));


    return $this->adjacency_list[$u][$v]; 
  }

  /**
   * Add a vertex. Vertex must not exist, assertion failure otherwise.
   */
  public function add_vertex($u,$data=null)
  {
    assert(!$this->has_vertex($u));

    //Associate data.
    $this->vertex_data[$u] = $data;
    //Create empty neighbor array.
    $this->adjacency_list[$u] = array();

    assert($this->has_vertex($u));
    assert($this->sanity_check());
  }

  public function has_vertex($u)
  {
    assert($this->sanity_check());
    assert(array_key_exists($u,$this->vertex_data) == array_key_exists($u,$this->adjacency_list));
    return array_key_exists($u,$this->vertex_data);
  }

  //Returns data associated with vertex, null if vertex does not exist.
  public function get_vertex_data($u)
  {
    assert($this->sanity_check());

    if (!array_key_exists($u,$this->vertex_data))
      return null;

    return $this->vertex_data[$u];
  }

  //Count the neighbors of a vertex.
  public function count_vertex_edges($u)
  {
    assert($this->sanity_check());

    if (!$this->has_vertex($u))
      return 0;

    //some sanity.    
    assert (array_key_exists($u,$this->adjacency_list));

    return count($this->adjacency_list[$u]);
  }

  /**
   * Return an array of neighbor vertices of u.
   * If $with_data == true, then it will return an associative array, like so:
   * {neighbor => data}.
   */
  public function get_edge_vertices($u,$with_data=false)
  {
    assert($this->sanity_check());

    if (!array_key_exists($u,$this->adjacency_list))
      return array();

    $result = array();

    if ($with_data) {
      foreach( $this->adjacency_list[$u] as $v=>$data)
      {
        $result[$v] = $data;
      }
    } else {

      foreach( $this->adjacency_list[$u] as $v=>$data)
      {
        array_push($result, $v);
      }
    }

    return $result;
  }

  //Removes a vertex if it exists, and returns its data, null otherwise.
  public function remove_vertex($u)
  {
    assert($this->sanity_check());

    //If the vertex does not exist,
    if (!$this->has_vertex($u)){
      //Sanity.
      assert(!array_key_exists($u,$this->vertex_data));
      assert(!array_key_exists($u,$this->adjacency_list));
      return null;
    }

    //We need to remove all edges that this vertex belongs to.
    foreach ($this->get_edge_vertices($u) as $v)
    {
      $this->remove_edge($u,$v);
    }


    //After removing all such edges, u should have no neighbors.
    assert($this->count_vertex_edges($u) == 0);

    //sanity.
    assert(array_key_exists($u,$this->vertex_data));
    assert(array_key_exists($u,$this->adjacency_list));

    //remember the data.
    $data = $this->vertex_data[$u];

    //remove the vertex from the data array.
    unset($this->vertex_data[$u]);
    //remove the vertex from the adjacency list.
    unset($this->adjacency_list[$u]);

    assert($this->sanity_check());

    return $data;
  }

  public function get_vertex_count()
  {
    assert($this->sanity_check());
    return count($this->vertex_data);
  }
  public function get_edge_count()
  {
    assert($this->sanity_check());

    //edge_count counts both (u,v) and (v,u)
    return $this->edge_count/2;
  }

  public function get_vertex_list($with_data=false)
  {
    $result = array();

    if ($with_data)
      foreach ($this->vertex_data as $u=>$data)
        $result[$u]=$data;
    else
      foreach ($this->vertex_data as $u=>$data)
        array_push($result,$u);

    return $result;
  }


  public function edge_list_str_array($ordered=true)
  {
    $result_strings = array();
    foreach($this->vertex_data as $u=>$udata)
    {
      foreach($this->adjacency_list[$u] as $v=>$uv_data)
      {
        if (!$ordered || ($u < $v))
          array_push($result_strings, '('.$u.','.$v.')');
      }
    }
    return $result_strings;
  }

  public function sanity_check()
  {
    if (count($this->vertex_data) != count($this->adjacency_list))
      return false;

    $edge_count = 0;

    foreach ($this->vertex_data as $v=>$data)
    {

      if (!array_key_exists($v,$this->adjacency_list))
        return false;

      $edge_count += count($this->adjacency_list[$v]);
    }

    if ($edge_count != $this->edge_count)
      return false;

    if (($this->edge_count % 2) != 0)
      return false;

    return true;
  }

  /**
   * This keeps an array that associates vertices with their neighbors like so:
   *
   * {<vertex> => {<neighbor> => <edge data>}}
   *
   * Thus, each $adjacency_list[$u] = array( $v1 => $u_v1_edge_data, $v2 => $u_v2_edge_data ...)
   *
   * The edge data can be null.
   */
  private $adjacency_list = array();

  /**
   * This associates each vertex with its data.
   *
   * {<vertex> => <data>}
   *
   * Thus each $vertex_data[$u] = $u_data
   */
  private $vertex_data = array();

  /**
   * This keeps tracks of the edge count so we can retrieve the count in constant time,
   * instead of recounting. In truth this counts both (u,v) and (v,u), so the actual count
   * is $edge_count/2.
   */
  private $edge_count = 0;
}


$G = new Graph();

for ($i=0; $i<5; ++$i)
{
  $G->add_vertex($i);
}

for ($i=5; $i<10; ++$i)
{
  $G->add_edge($i,$i-5);
}

print 'V: {'.join(', ',$G->get_vertex_list())."}<br/>";
print 'E: {'.join(', ',$G->edge_list_str_array())."}<br/>";

$G->remove_vertex(1);

print 'V: {'.join(', ',$G->get_vertex_list())."}<br/>";
print 'E: {'.join(', ',$G->edge_list_str_array())."}<br/>";

$G->remove_vertex(1);

print 'V: {'.join(', ',$G->get_vertex_list())."}<br/>";
print 'E: {'.join(', ',$G->edge_list_str_array())."}<br/>";
?>
