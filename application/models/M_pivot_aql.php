<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use GuzzleHttp\Client;
use GuzzleHttp\Middleware;
use GuzzleHttp\Psr7;
use GuzzleHttp\Exception\ClientException;

class M_pivot_aql extends CI_Model {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	
    private $_client;

    public function __construct()
    {
        $this->_client = new Client([
            'base_uri' => 'https://adidasstage4.pivot88.com/rest/operation/v1/', //link api server, ganti sesuai kebutuhan
            'auth' => ['hwaseung_api', 'Pivot88#'], //[username, password]
            'headers'=>[
                'api-key' => '9b8ef360-dd66-41f8-a9d0-4f42c33840f4'
            ]
        ]);

        $this->qip_baru = $this->load->database('qip_baru',TRUE);
    }

    public function get_dataPO($po){
        $client = new GuzzleHttp\Client();
        try{
            $response = $client->request('GET','https://adidasstage4.pivot88.com/rest/operation/v2/projects/project_code:FTW/purchaseorders/po_number:'.$po.'',[
                'auth' => ['hwaseung_api', 'Pivot88#'], //[username, password]
                'headers'=>[
                    'api-key' => '9b8ef360-dd66-41f8-a9d0-4f42c33840f4'
                ]
            ]);
            $result = json_decode($response->getBody()->getContents(), true);
            // return $result['data'];;
            // print_r($result);
            // echo $result;
            // echo $response->getStatusCode();
            // echo $response->getBody()->getContents();
            // $response->wait();
            return $response->getStatusCode();
        } catch(RequestException $e){
            return $e->getCode();
        } catch (ClientException $e) {
            return $e->getCode();
        } 
        // echo $po;
    }

    public function get_po_pivot(){
        $po     = $this->input->post['PO_NO'];

        $client = new GuzzleHttp\Client();
       
        $response = $client->request('GET','https://adidas.pivot88.com/rest/operation/v1/inspections?details=true&po_number='.$po.'',[
            'auth'=> ['ysha', 'hwiqip5!'],
            'headers' =>[
                // 'Cookie' =>  'PHPSESSID=3irnss6mrmd9mg3j19bp6aq01p',
                'username' => 'ysha',
                'password' => 'hwiqip5!',
                ]
            ]
        );
        $result = json_decode($response->getBody()->getContents(), true);
        
        return $result;
   }

   public function chart_defect(){
        return 1;
   }



   public function chart_rework(){
        $po     = $this->input->post('PO_NO'); 
        $query  = $this->qip_baru->query("select code as qcode, qty as defect, description as reason_desc, left(description,30) as defect_name from (
            SELECT in_defect_id, sum(qty) as qty FROM qip.rework_defect where rework_id in (SELECT id FROM qip.rework where po='$po' and uploaded > 0) group by in_defect_id
            ) as a
            join (
                select * from qip.in_defect
            ) as b
            on a.in_defect_id = b.id
            order by qty desc
            limit 5
            ");
        return $query->result_array();
   }

   public function chart_inline(){
        $po     = $this->input->post('PO_NO'); 
        $query  = $this->qip_baru->query("
            select code as qcode, qty as defect, description as reason_desc, left(description,30) as defect_name from (
                SELECT in_defect_id, sum(qty) as qty FROM qip.inline_defect where inline_id in (SELECT id FROM qip.inline where po='$po' and uploaded > 0)
                group by in_defect_id
                ) as a
                join (
                    select * from qip.in_defect
                ) as b
                on a.in_defect_id = b.id
                order by qty desc
                limit 5
        ");

        return $query->result_array();
   }

   public function chart_endline(){
    $po     = $this->input->post('PO_NO'); 
    $query  = $this->db->query("
        SELECT TOP 5 QCODE, A.DEFECT, B.REASON_DESC, LEFT(B.REASON_DESC,30) AS DEFECT_NAME FROM 
        (
            SELECT QCODE, COUNT(GD_CNT) AS DEFECT-- , LEFT(QCODE, CHARINDEX('.', QCODE) - 1) AS PARENT
            FROM THQIPLOG WITH (NOLOCK) 
            WHERE PO_NO='$po' 
            GROUP BY QCODE-- LEFT(QCODE, CHARINDEX('.', QCODE) - 1)
        ) AS A
        JOIN (SELECT * FROM HWI_REASON WHERE REASON_CLASS = 'QCODE') AS B
        ON A.QCODE = B.REASON_CODE
        ORDER BY A.DEFECT DESC
        
            ");
        return $query->result_array();
    }

   public function upload_foto($nama){
        $query = $this->db->query("INSERT INTO [QIP].[dbo].[test_foto]
                                            ([nama_foto])
                                    VALUES
                                            ('$nama')");
        return $query;
   }

   public function tampil_foto(){
        $query = $this->db->query("SELECT TOP 1 * FROM [QIP].[dbo].[test_foto]");
        return $query->result();
   }

   public function get_data_po($po){
        $query = $this->db->query("EXEC [QIP].[dbo].[AQL_GET_DATA_PO] @PO_NO='$po'");
        return $query;
    }


}
