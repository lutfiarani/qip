<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use GuzzleHttp\Client;
use GuzzleHttp\Middleware;
use GuzzleHttp\Psr7;
use GuzzleHttp\Exception\ClientException;

class M_pivot extends CI_Model {

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
        $client = new GuzzleHttp\Client();
        // try{
            $response = $client->request('GET','https://adidas.pivot88.com/rest/operation/v1/inspections?details=true&po_number=0132236281',[
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
    
   }

	public function view_data(){
        $tanggal = $this->input->post('tanggal');
        $query = $this->db->query("EXEC [QIP].[dbo].[PIVOT_FIRST_DATA] @tanggal ='$tanggal'");
        return $query;
    }

    public function view_generate(){
        $tanggal = $this->input->post('tanggal');
        $query = $this->db->query("SELECT *,  ROUND((ISNULL(cast(QTY_DEFECT as float),0)/cast(QTY_ASSY_IN as float)*100),2)AS DEFECT_RATE
        , CASE WHEN (ISNULL(cast(QTY_DEFECT as float),0)/cast(QTY_ASSY_IN as float)*100) > 15 THEN 'FAIL'
         ELSE 'PASS'
         END AS RESULT 
		 FROM
        (
            SELECT A.PO_NO
                , A.MODEL_NAME
                , A.ART_NO
                , A.QTY_ASSY_IN
                , ISNULL(SUM(B.QTY_DEFECT), 0) AS QTY_DEFECT
                , A.PO_ID
				, ISNULL(A.COMMENT,'') AS COMMENT
                , STEP_IN_TOOLS, STOP_LINE, STATUS_UPLOAD
                , STOP_LINE_REASON
        FROM [QIP].[dbo].PIVOT_TABLE_MES AS A WITH (NOLOCK)
        LEFT JOIN (SELECT * FROM QIP.dbo.PIVOT_DEFECT_QTY AS B WITH (NOLOCK) WHERE QCODE  NOT LIKE  '100%') AS B
        ON A.PO_ID = B.PO_ID
        AND A.PO_NO = B.PO_NO
		WHERE A.WORKDATE='$tanggal'
		GROUP BY A.PO_NO, A.MODEL_NAME, A.ART_NO, A.QTY_ASSY_IN, A.PO_ID, STEP_IN_TOOLS, STATUS_UPLOAD, STOP_LINE, COMMENT, STOP_LINE_REASON
        ) AS C");
        return $query;
    }
	
    public function generate_data(){
        $tanggal = $this->input->post('tanggal');
        $query = $this->db->query("EXEC [QIP].[dbo].PIVOT_GENERATE_DATA @tanggal = '$tanggal'");
        return $query;
    }

    public function view_defect_detail($po_id){
        $query = $this->db->query("
        SELECT D.PO_ID, D.PO_NO, A.QCODE
        , B.PARENT_REASON_CODE
        , SUM(CONVERT(NUMERIC, A.QTY_DEFECT)) AS QTY
        , B.REASON_DESC
        , C.REASON_DESC AS PARENT
        FROM [QIP].[DBO].PIVOT_TABLE_MES AS D WITH (NOLOCK)
		LEFT JOIN [QIP].[DBO].PIVOT_DEFECT_QTY AS A WITH (NOLOCK)
		ON D.PO_ID = A.PO_ID
        LEFT JOIN HWI_REASON AS B WITH (NOLOCK)
        ON A.QCODE = B.REASON_CODE
        LEFT JOIN HWI_REASON AS C WITH (NOLOCK)
        ON B.PARENT_REASON_CODE = C.REASON_CODE
        WHERE D.PO_ID='$po_id'
        GROUP BY D.PO_ID, D.PO_NO, A.QCODE, B.PARENT_REASON_CODE, B.REASON_DESC, C.REASON_DESC


        ");
        return $query->result();
    }

    public function delete_detail($PO_ID, $QCODE){
        $query = $this->db->query("DELETE FROM [QIP].[DBO].PIVOT_DEFECT_QTY WHERE PO_ID='$PO_ID' AND QCODE='$QCODE'");
        return $query;
    }

    public function cari_qcode(){
        $search     = $this->input->post('query');
		
        $query      = "SELECT A.REASON_CODE, B.REASON_DESC, C.REASON_DESC AS PARENT , A.PARENT_REASON_CODE
                        FROM HWI_REASON AS A WITH (NOLOCK)
                        JOIN HWI_REASON AS B WITH (NOLOCK)
                        ON A.REASON_CODE=B.REASON_CODE
                        JOIN HWI_REASON AS C WITH (NOLOCK)
                        ON B.PARENT_REASON_CODE=C.REASON_CODE
                        WHERE A.USE_FLAG='Y'
                        ";
       
		if($search != '')
		{
		$query .= "
            AND A.REASON_CODE like '%".str_replace(' ', '%', $search)."%' 
		";
		}

		$run = $this->db->query($query);
		return $run->result();
        
	}

    public function tambah_detail(){
        $PO_ID  = $this->input->post('PO_ID');
        $Qcode  = $this->input->post('Qcode');
        $PO     = $this->input->post('PO');
        $qty    = $this->input->post('qty');

        $query  = $this->db->query("INSERT INTO [QIP].[DBO].[PIVOT_DEFECT_QTY](PO_ID, PO_NO, QCODE, QTY_DEFECT, CREATED_AT, UPDATED_AT)
                                    VALUES ('$PO_ID', '$PO','$Qcode', '$qty', getdate(), getdate())"); 
        return $query;
        
    }

    public function pivot_get(){
        $response = $this->_client->request('GET','companies');

        $result = json_decode($response->getBody()->getContents(), true);
        print_r($result);

    }

    public function pivot_put($po_id){
        $json = file_get_contents('http://10.10.100.23/qip_api_test/C_pivot_test_V1/index/'.$po_id);
        $json2 = json_decode($json);
        $response = $this->_client->put('inspection_reports/unique_key:hwi_'.$po_id,[
            'json'=>$json2
        ]);
        
        $result = json_decode($response->getBody()->getContents(), true);
        return $response;
        
    }

    public function pivot_put_(){
        $json = file_get_contents('http://10.10.100.23/qip_api_test/C_pivot_test_V1/index/1179');
        $json2 = json_decode($json);
        $response = $this->_client->put('inspection_reports/unique_key:hwi_1',[
            'json'=>$json2
        ]);
        
        $result = json_decode($response->getBody()->getContents(), true);
        return $response;
        
    }


    public function save_comment(){
        $po_id = $this->input->post('PO_NO_ID');
        $comment = $this->input->post('comment');
        $query = $this->db->query("UPDATE [QIP].[dbo].[PIVOT_TABLE_MES]
                                    SET COMMENT = '$comment',
                                        UPDATED_AT = GETDATE()
                                    WHERE PO_ID = '$po_id'        ");

        return $query;
    }

    public function banyak_data($tanggal){
        $query = $this->db->query("SELECT COUNT(PO_ID) AS BANYAK 
                                    FROM [QIP].[dbo].[PIVOT_TABLE_MES] WITH (NOLOCK)
                                    WHERE STATUS_UPLOAD='N' 
                                    AND WORKDATE = '$tanggal'
                                    ");
        return $query->row();
    }

    public function data_mes($po_id){
        $query = $this->db->query("SELECT * FROM [QIP].[dbo].[PIVOT_TABLE_MES] WITH (NOLOCK) WHERE PO_ID ='$po_id' AND STATUS_UPLOAD='N' AND PO_ID NOT IN ('1179','1180') ");
        return $query->result();
    }

    // public function data_mes_all($tanggal){
    //     $query = $this->db->query("SELECT * FROM [QIP].[dbo].[PIVOT_TABLE_MES] WITH (NOLOCK) WHERE STATUS_UPLOAD='N'  AND WORKDATE = '$tanggal'");
    //     return $query->result_array();
    // }

    public function data_mes_all($tanggal){
        $query = $this->db->query("SELECT TOP 10 * FROM [QIP].[dbo].[PIVOT_TABLE_MES] WITH (NOLOCK) WHERE PO_NO ='0131118405'
        AND WORKDATE = '20221013'");
        return $query->result_array();
    }

    public function update_status($po_id,$status){
        $query = $this->db->query("UPDATE [QIP].[dbo].[PIVOT_TABLE_MES] 
                                   SET STATUS_UPLOAD='$status'
                                   , UPDATED_AT = GETDATE()
                                   WHERE PO_ID = '$po_id'
                                   AND STATUS_UPLOAD='N' ");
        return $query;
    }


    public function cell(){
        $tanggal = $this->input->post('tanggal');
        $query = $this->db->query("
                        SELECT E.CELL_CODE
                                , E.PO_NO
                                , ART_NO
                                , MODEL_NAME
                                , QTY_ASS_IN
                                , ISNULL(DEFECT,0) AS DEFECT
                                , CAST(ISNULL(DEFECT,0) AS FLOAT)/CAST(QTY_ASS_IN AS FLOAT)*100 AS DEFECT_RATE
                                , '$tanggal' AS WORKDATE
                        FROM 
                        (
                            SELECT A.CELL_CODE
                                    , A.PO_NO
                                    , A.ART_NO
                                    , B.MODEL_NAME
                                    , SUM(CONVERT(NUMERIC, GD_CNT)) AS QTY_ASS_IN
                            FROM THPRODLOG AS A WITH (NOLOCK)
                            JOIN THPRODHISPO AS B WITH (NOLOCK)
                            ON A.PO_NO = B.PO_NO
                            WHERE CONVERT(CHAR(8), A.LMNT_DTTM,112) ='$tanggal'
                            AND PROD_STATUS ='AS'
                            GROUP BY A.CELL_CODE, A.PO_NO,A.ART_NO, B.MODEL_NAME
                        ) AS E
                        LEFT JOIN 
                        (
                                SELECT C.CELL_CODE
                                        , C.PO_NO
                                        , SUM(CONVERT(NUMERIC, GD_CNT)) AS DEFECT 
                                FROM THQIPLOG C WITH (NOLOCK)
                                WHERE CONVERT(CHAR(8), C.LMNT_DTTM,112) ='$tanggal'
                                GROUP BY C.CELL_CODE, C.PO_NO
                        ) AS C
                        ON E.CELL_CODE = C.CELL_CODE
                        AND E.PO_NO = C.PO_NO
                        ORDER BY CELL_CODE, PO_NO
        ");
        return $query;
    }

    public function edit_qty(){
        $PO_ID   = $this->input->post('PO_ID');
        $QCODE   = $this->input->post('QCODE');
        $qty     = $this->input->post('qty');
        $query   = $this->db->query("UPDATE [QIP].[dbo].[PIVOT_DEFECT_QTY]
                                        SET QTY_DEFECT = '$qty',
                                        UPDATED_AT = GETDATE()
                                        WHERE PO_ID = '$PO_ID'
                                        AND   QCODE = '$QCODE'
        ");

        return $query;
    }

    public function get_PO($po_id){
        $query = $this->db->query("SELECT PO_NO FROM [QIP].[dbo].[PIVOT_TABLE_MES] WHERE PO_ID = '$po_id'");
        // $query = ("SELECT PO_NO FROM [QIP].[dbo].[PIVOT_TABLE_MES] WHERE PO_ID = '$po_id'");
        return $query->row();
        // echo $query;
    }

    public function aql_pivot_put($po_id){
        $json       = file_get_contents('http://10.10.100.23/qip_api_test/C_pivot_test_V1/send_aql/'.$po_id);
        $json2      = json_decode($json);
        $response   = $this->_client->put('inspection_reports/unique_key:hwi_aql_'.$po_id,[
                            'json'=>$json2
                        ]);
        
        $result     = json_decode($response->getBody()->getContents(), true);
        return $response;
    }
}
