<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Defect extends CI_Model {

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
	
	public function tampil_defect()
	{
        $query = $this->db->query("
        SELECT QCODE, DATEPART(HOUR,LMNT_DTTM) AS [Hour], COUNT(*) AS [Count]
            FROM THQIPLOG
            WHERE left(DEVICE_ID,2)='FG'
            AND QCODE='26'
            AND CONVERT(CHAR(8),LMNT_DTTM,112)=CONVERT(CHAR(8),GETDATE(),112)
            GROUP BY QCODE, DATEPART(HOUR, LMNT_DTTM)
            ")->result_array();
        return $query;
    }

    public function tampil_coba(){
        $query = $this->db->query("
        SELECT * FROM (SELECT TOP 3 QCODE, SUM(CONVERT(NUMERIC, GD_CNT)) AS QTY FROM THQIPLOG
            WHERE left(DEVICE_ID,2)='FG'
            AND CONVERT(CHAR(8),LMNT_DTTM,112)=CONVERT(CHAR(8),GETDATE(),112)
            GROUP BY QCODE
            ORDER BY QTY DESC) AS A
            JOIN
            (
            SELECT QCODE, DATEPART(HOUR,LMNT_DTTM) AS [Hour], COUNT(*) AS [Count]
            FROM THQIPLOG
            WHERE left(DEVICE_ID,2)='FG'
            AND CONVERT(CHAR(8),LMNT_DTTM,112)=CONVERT(CHAR(8),GETDATE(),112)
            GROUP BY QCODE, DATEPART(HOUR, LMNT_DTTM)
            ) AS B ON A.QCODE=B.QCODE
            ORDER BY A.QCODE, Hour
        ")->result_array();
        print_r($query);
    }

    /* public function ranking(){
        $query = $this->db->query("
            SELECT * INTO #TEMP_DEFECT_QIP FROM(
            SELECT *, RANK () OVER ( 
             ORDER BY QTY DESC) 
             AS RANKING FROM 
            (SELECT TOP 3 QCODE, SUM(CONVERT(NUMERIC, GD_CNT)) AS QTY  FROM THQIPLOG
            WHERE LEFT(DEVICE_ID,2)='FG'
            AND CONVERT(CHAR(8),LMNT_DTTM,112)=CONVERT(CHAR(8),GETDATE(),112)
            GROUP BY QCODE) AS A
            ) AS B
            ORDER BY QTY DESC")->result_array();
        return $query;
    } */
	
	public function ranking(){
        $query = $this->db->query("
            SELECT   B.QCODE, B.QTY, B.RANKING
			INTO   #TEMP_DEFECT_QIP 
			FROM   (
				SELECT   A.QCODE, A.QTY, RANK () OVER ( ORDER BY QTY DESC) AS RANKING 
                FROM   
                (
					  SELECT   TOP 3 QCODE, SUM(CONVERT(NUMERIC, GD_CNT)) AS QTY  
					  FROM   THQIPLOG WITH(NOLOCK, INDEX(IDX_LMNTDTTM_ONLY))
					  WHERE   LEFT(DEVICE_ID, 2) = 'FG'
					  AND CONVERT(CHAR(8), LMNT_DTTM, 112) = CONVERT(CHAR(8),GETDATE(),112)
					  GROUP BY QCODE
				   ) AS A
			) AS B
			ORDER   BY QTY DESC
			")->result_array();
        return $query;
    }

    /* public function nama_defect($ranking){
        $query = $this->db->query("
        SELECT CODE_DESC FROM(
            SELECT * FROM #TEMP_DEFECT_QIP WHERE RANKING='$ranking'
            ) AS A JOIN (SELECT * FROM C_CODE WHERE CODE_GRP='QCODE') AS B
            ON A.QCODE=B.CODE_ID
        ")->row();
        return $query;
    } */
	
	public function nama_defect($ranking){
        $query = $this->db->query("
			SELECT CODE_DESC 
			FROM(
				SELECT   A.QCODE, A.QTY, A.RANKING
			  FROM   #TEMP_DEFECT_QIP A
			  WHERE   A.RANKING = '$ranking'
			) AS A 
		   INNER JOIN (
			  SELECT   A.CODE_DESC, A.CODE_ID
			  FROM   C_CODE A
			  WHERE   CODE_GRP = 'QCODE'
		   ) AS B ON A.QCODE=B.CODE_ID
        ")->row();
        return $query;
    }

    /* public function defect_per_hour($ranking){
        $query = $this->db->query("
        SELECT QCODE, DATEPART(HOUR,LMNT_DTTM) AS [Hour], COUNT(*) AS [Count]
            FROM THQIPLOG
            WHERE left(DEVICE_ID,2)='FG'
            AND QCODE IN (SELECT QCODE FROM  #TEMP_DEFECT_QIP WHERE RANKING='$ranking')
            AND CONVERT(CHAR(8),LMNT_DTTM,112)=CONVERT(CHAR(8),GETDATE(),112)
            GROUP BY QCODE, DATEPART(HOUR, LMNT_DTTM)
        ")->result_array();

        return $query;
    } */
	
	public function defect_per_hour($ranking){
        $query = $this->db->query("
		SELECT   A.QCODE, DATEPART(HOUR,LMNT_DTTM) AS [Hour], COUNT(A.QCODE) AS [Count]
        FROM   THQIPLOG A WITH(NOLOCK)
            INNER JOIN (
                SELECT QCODE 
                FROM  #TEMP_DEFECT_QIP 
                WHERE RANKING = '$ranking'
            ) B ON A.QCODE = B.QCODE
        WHERE LEFT(DEVICE_ID,2) = 'FG'
        AND CONVERT(CHAR(8),LMNT_DTTM,112) = CONVERT(CHAR(8),GETDATE(),112)
        GROUP BY A.QCODE, DATEPART(HOUR, LMNT_DTTM)
        ")->result_array();

        return $query;
    }

    /* public function hapus_ranking(){
        $query = $this->db->query(" drop table #TEMP_DEFECT_QIP");
        return $query;
    } */
	
	public function hapus_ranking(){
        $query = $this->db->query("DROP TABLE #TEMP_DEFECT_QIP");
        return $query;
    }
}
