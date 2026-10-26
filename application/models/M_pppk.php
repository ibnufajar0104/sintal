<?php
class M_pppk extends CI_model
{

    protected $table_view = 'p3k';
    protected $primary_key = 'id_p3k';
    protected $column_order = array('id_p3k'); //set column field database for datatable orderable
    protected $column_search = array('nip', 'nama', 'jabatan', 'nama_skpd'); //set column field database for datatable searchable 
    protected $order = array('id_p3k' => 'desc');
    protected $allowedFilter  = [];

    public function __construct()
    {
        parent::__construct();

        $this->load->database();
    }

    private function _get_datatables_query()
    {

        $this->db->from($this->table_view);
        $this->db->join('ref_skpd', $this->table_view . '.id_skpd = ref_skpd.id_skpd');

        $i = 0;

        foreach ($this->column_search as $item) // loop column 
        {
            if ($this->_search_value() !== '') // if datatable send POST for search
            {

                if ($i === 0) // first loop
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $this->_search_value(), 'both');
                } else {
                    $this->db->or_like($item, $this->_search_value(), 'both');
                }

                if (count($this->column_search) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }

        if (isset($_POST['order'][0]['column'], $this->column_order[(int) $_POST['order'][0]['column']])) // here order processing
        {
            $dir = strtolower((string) ($_POST['order'][0]['dir'] ?? '')) === 'asc' ? 'ASC' : 'DESC';
            $this->db->order_by($this->column_order[(int) $_POST['order'][0]['column']], $dir);
        } else if (isset($this->order)) {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    public function get_data()
    {
        $this->_get_datatables_query();
        $length = (int) ($_POST['length'] ?? 10);
        if ($length != -1)
            $this->db->limit(min(max($length, 1), 500), max((int) ($_POST['start'] ?? 0), 0));



        if ($this->filter()) {
            $this->db->where($this->filter());
        }

        $query = $this->db->get();
        return $query->result_array();
    }

    public function count_filtered()
    {
        $this->_get_datatables_query();

        if ($this->filter()) {
            $this->db->where($this->filter());
        }

        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all()
    {

        if ($this->filter()) {
            $this->db->where($this->filter());
        }

        $this->db->from($this->table_view);
        $this->db->join('ref_skpd', $this->table_view . '.id_skpd = ref_skpd.id_skpd');
        return $this->db->count_all_results();
    }


    private function filter()
    {
        $data = array();
        foreach ($this->allowedFilter as $key) {

            if ($this->input->post($key)) {

                $data[$key] = $this->input->post($key);
            }
        }
        return $data;
    }
    private function _search_value()
    {
        return isset($_POST['search']['value']) && is_string($_POST['search']['value']) ? trim($_POST['search']['value']) : '';
    }
}
