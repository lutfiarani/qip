<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use GuzzleHttp\Client;
use GuzzleHttp\Middleware;
use GuzzleHttp\Psr7;
use GuzzleHttp\Exception\ClientException;

class M_coba extends CI_Model {

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

        $this->_client_test = new Client([
            'base_uri' => 'https://adidasstage4.pivot88.com/rest/operation/v1/', //link api server, ganti sesuai kebutuhan
            'auth' => ['hwaseung_api', 'Pivot88#'], //[username, password]
            'headers'=>[
                // 'api-key' => '9b8ef360-dd66-41f8-a9d0-4f42c33840f4'
                'server' => 'https://adidasstage4.pivot88.com',
                'username' => 'hwaseung_api',
                'password' => 'Pivot88#',
                'api-key' => '9b8ef360-dd66-41f8-a9d0-4f42c33840f4',
                'Content-Type' => 'application/json',
                'Cookie' => 'ci_session=5p5u4tt9b85p066menlovodhe54l3d1j'
            ]
        ]);
    }

   public function data_pivot_coba(){
    $data = '{
        "status": "Submitted",
        "date_started": "2023-05-15T07:00:00.",
        "defective_parts": 3,
        "sections": [
          {
            "type": "aqlDefects",
            "title": "packing_packaging_labelling",
            "section_result_id": 1,
            "qty_inspected": 1000,
            "sampled_inspected": 80,
            "defective_parts": 0,
            "inspection_level": "II",
            "inspection_method": "normal",
            "aql_minor": 2.5,
            "aql_major": 1.5,
            "aql_major_a": 1,
            "aql_major_b": 1,
            "aql_critical": 0.01,
            "barcodes": [
              {
                "value": "0000"
              }
            ],
            "qty_type": "carton",
            "max_minor_defects": 6,
            "max_major_defects": 4,
            "max_major_a_defects": 0,
            "max_major_b_defects": 0,
            "max_critical_defects": 1,
            "defects": [
              {
                "label": "",
                "subsection": "",
                "code": "",
                "critical_level": 0,
                "major_level": 0,
                "minor_level": 0,
                "comments": "No Comments",
                "pictures": []
              }
            ]
          },
          {
            "type": "aqlDefects",
            "title": "product",
            "section_result_id": 1,
            "qty_inspected": 1000,
            "sampled_inspected": 80,
            "defective_parts": 3,
            "inspection_level": "II",
            "inspection_method": "normal",
            "aql_minor": 2.5,
            "aql_major": 1.5,
            "aql_major_a": 1,
            "aql_major_b": 1,
            "aql_critical": 0.01,
            "max_minor_defects": 6,
            "max_major_defects": 4,
            "max_major_a_defects": 0,
            "max_major_b_defects": 0,
            "max_critical_defects": 1,
            "defects": [
              {
                "subsection": "WRONG BOTTOM /UPPER SIZE",
                "label": "ASSEMBLING(attaching BOTTOM TO UPPER) ",
                "code": "FTW500.04",
                "critical_level": 0,
                "major_level": 1,
                "minor_level": 0,
                "comments": "No Comments",
                "pictures": []
              },
              {
                "subsection": "OVER CEMENTING OR PRIMING ",
                "label": "BOTTOM AND STOCKFITTING(attaching midsole and components to outsole) < 4mm length, > 2mm width",
                "code": "FTW400.03",
                "critical_level": 0,
                "major_level": 0,
                "minor_level": 1,
                "comments": "No Comments",
                "pictures": []
              }
            ]
          },
          {
            "type": "pictures",
            "title": "photos",
            "pictures": []
          }
        ],
        "assignment_items": [
          {
            "fields": {
              "string_7": "",
              "string_12": "",
              "string_13": ""
            },
            "sampled_inspected": "222",
            "inspection_result_id": 1,
            "inspection_status_id": 3,
            "qty_inspected": 222,
            "inspection_completed_date": "2023-05-15T16:00:00.",
            "total_inspection_minutes": 480,
            "sampling_size": 80,
            "qty_to_inspect": 1000,
            "aql_minor": 2.5,
            "aql_major": 1.5,
            "aql_major_a": 1,
            "aql_major_b": 1,
            "aql_critical": 0.01,
            "supplier_booking_msg": "",
            "assignment": {
              "report_type": {
                "id": 9
              },
              "inspector": {
                "username": "hsilevel1-1"
              },
              "date_inspection": "2023-05-15T07:00:00.",
              "inspection_level": "100%inspection",
              "inspection_method": "normal"
            },
            "po_line": {
              "qty": 222,
              "etd": "2023-02-15T00:00:00",
              "eta": "2023-02-15T00:00:00",
              "color": "CORE BLACK / CORE BLACK / CARBON S18",
              "size": "10",
              "style": "KAPTIR 2.0 M",
              "po": {
                "exporter": {
                  "id": 263,
                  "erp_business_id": "28Y"
                },
                "po_number": "0131850088",
                "customer_po": "",
                "importer": {
                  "id": 215,
                  "erp_business_id": "Adidas001"
                },
                "project": {
                  "id": 2062
                }
              },
              "sku": {
                "sku_number": "HJ1413_10",
                "item_name": "skuname",
                "item_description": ""
              }
            }
          },
          {
            "fields": {
              "string_7": "",
              "string_12": "",
              "string_13": ""
            },
            "sampled_inspected": "114",
            "inspection_result_id": 1,
            "inspection_status_id": 3,
            "qty_inspected": 114,
            "inspection_completed_date": "2023-05-15T16:00:00.",
            "total_inspection_minutes": 480,
            "sampling_size": 80,
            "qty_to_inspect": 1000,
            "aql_minor": 2.5,
            "aql_major": 1.5,
            "aql_major_a": 1,
            "aql_major_b": 1,
            "aql_critical": 0.01,
            "supplier_booking_msg": "",
            "assignment": {
              "report_type": {
                "id": 9
              },
              "inspector": {
                "username": "hsilevel1-1"
              },
              "date_inspection": "2023-05-15T07:00:00.",
              "inspection_level": "100%inspection",
              "inspection_method": "normal"
            },
            "po_line": {
              "qty": 114,
              "etd": "2023-02-15T00:00:00",
              "eta": "2023-02-15T00:00:00",
              "color": "CORE BLACK / CORE BLACK / CARBON S18",
              "size": "10-",
              "style": "KAPTIR 2.0 M",
              "po": {
                "exporter": {
                  "id": 263,
                  "erp_business_id": "28Y"
                },
                "po_number": "0131850088",
                "customer_po": "",
                "importer": {
                  "id": 215,
                  "erp_business_id": "Adidas001"
                },
                "project": {
                  "id": 2062
                }
              },
              "sku": {
                "sku_number": "HJ1413_10-",
                "item_name": "skuname",
                "item_description": ""
              }
            }
          },
          {
            "fields": {
              "string_7": "",
              "string_12": "",
              "string_13": ""
            },
            "sampled_inspected": "32",
            "inspection_result_id": 1,
            "inspection_status_id": 3,
            "qty_inspected": 32,
            "inspection_completed_date": "2023-05-15T16:00:00.",
            "total_inspection_minutes": 480,
            "sampling_size": 80,
            "qty_to_inspect": 1000,
            "aql_minor": 2.5,
            "aql_major": 1.5,
            "aql_major_a": 1,
            "aql_major_b": 1,
            "aql_critical": 0.01,
            "supplier_booking_msg": "",
            "assignment": {
              "report_type": {
                "id": 9
              },
              "inspector": {
                "username": "hsilevel1-1"
              },
              "date_inspection": "2023-05-15T07:00:00.",
              "inspection_level": "100%inspection",
              "inspection_method": "normal"
            },
            "po_line": {
              "qty": 32,
              "etd": "2023-02-15T00:00:00",
              "eta": "2023-02-15T00:00:00",
              "color": "CORE BLACK / CORE BLACK / CARBON S18",
              "size": "11",
              "style": "KAPTIR 2.0 M",
              "po": {
                "exporter": {
                  "id": 263,
                  "erp_business_id": "28Y"
                },
                "po_number": "0131850088",
                "customer_po": "",
                "importer": {
                  "id": 215,
                  "erp_business_id": "Adidas001"
                },
                "project": {
                  "id": 2062
                }
              },
              "sku": {
                "sku_number": "HJ1413_11",
                "item_name": "skuname",
                "item_description": ""
              }
            }
          },
          {
            "fields": {
              "string_7": "",
              "string_12": "",
              "string_13": ""
            },
            "sampled_inspected": "9",
            "inspection_result_id": 1,
            "inspection_status_id": 3,
            "qty_inspected": 9,
            "inspection_completed_date": "2023-05-15T16:00:00.",
            "total_inspection_minutes": 480,
            "sampling_size": 80,
            "qty_to_inspect": 1000,
            "aql_minor": 2.5,
            "aql_major": 1.5,
            "aql_major_a": 1,
            "aql_major_b": 1,
            "aql_critical": 0.01,
            "supplier_booking_msg": "",
            "assignment": {
              "report_type": {
                "id": 9
              },
              "inspector": {
                "username": "hsilevel1-1"
              },
              "date_inspection": "2023-05-15T07:00:00.",
              "inspection_level": "100%inspection",
              "inspection_method": "normal"
            },
            "po_line": {
              "qty": 9,
              "etd": "2023-02-15T00:00:00",
              "eta": "2023-02-15T00:00:00",
              "color": "CORE BLACK / CORE BLACK / CARBON S18",
              "size": "11-",
              "style": "KAPTIR 2.0 M",
              "po": {
                "exporter": {
                  "id": 263,
                  "erp_business_id": "28Y"
                },
                "po_number": "0131850088",
                "customer_po": "",
                "importer": {
                  "id": 215,
                  "erp_business_id": "Adidas001"
                },
                "project": {
                  "id": 2062
                }
              },
              "sku": {
                "sku_number": "HJ1413_11-",
                "item_name": "skuname",
                "item_description": ""
              }
            }
          },
          {
            "fields": {
              "string_7": "",
              "string_12": "",
              "string_13": ""
            },
            "sampled_inspected": "10",
            "inspection_result_id": 1,
            "inspection_status_id": 3,
            "qty_inspected": 10,
            "inspection_completed_date": "2023-05-15T16:00:00.",
            "total_inspection_minutes": 480,
            "sampling_size": 80,
            "qty_to_inspect": 1000,
            "aql_minor": 2.5,
            "aql_major": 1.5,
            "aql_major_a": 1,
            "aql_major_b": 1,
            "aql_critical": 0.01,
            "supplier_booking_msg": "",
            "assignment": {
              "report_type": {
                "id": 9
              },
              "inspector": {
                "username": "hsilevel1-1"
              },
              "date_inspection": "2023-05-15T07:00:00.",
              "inspection_level": "100%inspection",
              "inspection_method": "normal"
            },
            "po_line": {
              "qty": 10,
              "etd": "2023-02-15T00:00:00",
              "eta": "2023-02-15T00:00:00",
              "color": "CORE BLACK / CORE BLACK / CARBON S18",
              "size": "12",
              "style": "KAPTIR 2.0 M",
              "po": {
                "exporter": {
                  "id": 263,
                  "erp_business_id": "28Y"
                },
                "po_number": "0131850088",
                "customer_po": "",
                "importer": {
                  "id": 215,
                  "erp_business_id": "Adidas001"
                },
                "project": {
                  "id": 2062
                }
              },
              "sku": {
                "sku_number": "HJ1413_12",
                "item_name": "skuname",
                "item_description": ""
              }
            }
          },
          {
            "fields": {
              "string_7": "",
              "string_12": "",
              "string_13": ""
            },
            "sampled_inspected": "122",
            "inspection_result_id": 1,
            "inspection_status_id": 3,
            "qty_inspected": 122,
            "inspection_completed_date": "2023-05-15T16:00:00.",
            "total_inspection_minutes": 480,
            "sampling_size": 80,
            "qty_to_inspect": 1000,
            "aql_minor": 2.5,
            "aql_major": 1.5,
            "aql_major_a": 1,
            "aql_major_b": 1,
            "aql_critical": 0.01,
            "supplier_booking_msg": "",
            "assignment": {
              "report_type": {
                "id": 9
              },
              "inspector": {
                "username": "hsilevel1-1"
              },
              "date_inspection": "2023-05-15T07:00:00.",
              "inspection_level": "100%inspection",
              "inspection_method": "normal"
            },
            "po_line": {
              "qty": 122,
              "etd": "2023-02-15T00:00:00",
              "eta": "2023-02-15T00:00:00",
              "color": "CORE BLACK / CORE BLACK / CARBON S18",
              "size": "6",
              "style": "KAPTIR 2.0 M",
              "po": {
                "exporter": {
                  "id": 263,
                  "erp_business_id": "28Y"
                },
                "po_number": "0131850088",
                "customer_po": "",
                "importer": {
                  "id": 215,
                  "erp_business_id": "Adidas001"
                },
                "project": {
                  "id": 2062
                }
              },
              "sku": {
                "sku_number": "HJ1413_6",
                "item_name": "skuname",
                "item_description": ""
              }
            }
          },
          {
            "fields": {
              "string_7": "",
              "string_12": "",
              "string_13": ""
            },
            "sampled_inspected": "491",
            "inspection_result_id": 1,
            "inspection_status_id": 3,
            "qty_inspected": 491,
            "inspection_completed_date": "2023-05-15T16:00:00.",
            "total_inspection_minutes": 480,
            "sampling_size": 80,
            "qty_to_inspect": 1000,
            "aql_minor": 2.5,
            "aql_major": 1.5,
            "aql_major_a": 1,
            "aql_major_b": 1,
            "aql_critical": 0.01,
            "supplier_booking_msg": "",
            "assignment": {
              "report_type": {
                "id": 9
              },
              "inspector": {
                "username": "hsilevel1-1"
              },
              "date_inspection": "2023-05-15T07:00:00.",
              "inspection_level": "100%inspection",
              "inspection_method": "normal"
            },
            "po_line": {
              "qty": 491,
              "etd": "2023-02-15T00:00:00",
              "eta": "2023-02-15T00:00:00",
              "color": "CORE BLACK / CORE BLACK / CARBON S18",
              "size": "6-",
              "style": "KAPTIR 2.0 M",
              "po": {
                "exporter": {
                  "id": 263,
                  "erp_business_id": "28Y"
                },
                "po_number": "0131850088",
                "customer_po": "",
                "importer": {
                  "id": 215,
                  "erp_business_id": "Adidas001"
                },
                "project": {
                  "id": 2062
                }
              },
              "sku": {
                "sku_number": "HJ1413_6-",
                "item_name": "skuname",
                "item_description": ""
              }
            }
          },
          {
            "fields": {
              "string_7": "",
              "string_12": "",
              "string_13": ""
            },
            "sampled_inspected": "594",
            "inspection_result_id": 1,
            "inspection_status_id": 3,
            "qty_inspected": 594,
            "inspection_completed_date": "2023-05-15T16:00:00.",
            "total_inspection_minutes": 480,
            "sampling_size": 80,
            "qty_to_inspect": 1000,
            "aql_minor": 2.5,
            "aql_major": 1.5,
            "aql_major_a": 1,
            "aql_major_b": 1,
            "aql_critical": 0.01,
            "supplier_booking_msg": "",
            "assignment": {
              "report_type": {
                "id": 9
              },
              "inspector": {
                "username": "hsilevel1-1"
              },
              "date_inspection": "2023-05-15T07:00:00.",
              "inspection_level": "100%inspection",
              "inspection_method": "normal"
            },
            "po_line": {
              "qty": 594,
              "etd": "2023-02-15T00:00:00",
              "eta": "2023-02-15T00:00:00",
              "color": "CORE BLACK / CORE BLACK / CARBON S18",
              "size": "7",
              "style": "KAPTIR 2.0 M",
              "po": {
                "exporter": {
                  "id": 263,
                  "erp_business_id": "28Y"
                },
                "po_number": "0131850088",
                "customer_po": "",
                "importer": {
                  "id": 215,
                  "erp_business_id": "Adidas001"
                },
                "project": {
                  "id": 2062
                }
              },
              "sku": {
                "sku_number": "HJ1413_7",
                "item_name": "skuname",
                "item_description": ""
              }
            }
          },
          {
            "fields": {
              "string_7": "",
              "string_12": "",
              "string_13": ""
            },
            "sampled_inspected": "931",
            "inspection_result_id": 1,
            "inspection_status_id": 3,
            "qty_inspected": 931,
            "inspection_completed_date": "2023-05-15T16:00:00.",
            "total_inspection_minutes": 480,
            "sampling_size": 80,
            "qty_to_inspect": 1000,
            "aql_minor": 2.5,
            "aql_major": 1.5,
            "aql_major_a": 1,
            "aql_major_b": 1,
            "aql_critical": 0.01,
            "supplier_booking_msg": "",
            "assignment": {
              "report_type": {
                "id": 9
              },
              "inspector": {
                "username": "hsilevel1-1"
              },
              "date_inspection": "2023-05-15T07:00:00.",
              "inspection_level": "100%inspection",
              "inspection_method": "normal"
            },
            "po_line": {
              "qty": 931,
              "etd": "2023-02-15T00:00:00",
              "eta": "2023-02-15T00:00:00",
              "color": "CORE BLACK / CORE BLACK / CARBON S18",
              "size": "7-",
              "style": "KAPTIR 2.0 M",
              "po": {
                "exporter": {
                  "id": 263,
                  "erp_business_id": "28Y"
                },
                "po_number": "0131850088",
                "customer_po": "",
                "importer": {
                  "id": 215,
                  "erp_business_id": "Adidas001"
                },
                "project": {
                  "id": 2062
                }
              },
              "sku": {
                "sku_number": "HJ1413_7-",
                "item_name": "skuname",
                "item_description": ""
              }
            }
          },
          {
            "fields": {
              "string_7": "",
              "string_12": "",
              "string_13": ""
            },
            "sampled_inspected": "1007",
            "inspection_result_id": 1,
            "inspection_status_id": 3,
            "qty_inspected": 1007,
            "inspection_completed_date": "2023-05-15T16:00:00.",
            "total_inspection_minutes": 480,
            "sampling_size": 80,
            "qty_to_inspect": 1000,
            "aql_minor": 2.5,
            "aql_major": 1.5,
            "aql_major_a": 1,
            "aql_major_b": 1,
            "aql_critical": 0.01,
            "supplier_booking_msg": "",
            "assignment": {
              "report_type": {
                "id": 9
              },
              "inspector": {
                "username": "hsilevel1-1"
              },
              "date_inspection": "2023-05-15T07:00:00.",
              "inspection_level": "100%inspection",
              "inspection_method": "normal"
            },
            "po_line": {
              "qty": 1007,
              "etd": "2023-02-15T00:00:00",
              "eta": "2023-02-15T00:00:00",
              "color": "CORE BLACK / CORE BLACK / CARBON S18",
              "size": "8",
              "style": "KAPTIR 2.0 M",
              "po": {
                "exporter": {
                  "id": 263,
                  "erp_business_id": "28Y"
                },
                "po_number": "0131850088",
                "customer_po": "",
                "importer": {
                  "id": 215,
                  "erp_business_id": "Adidas001"
                },
                "project": {
                  "id": 2062
                }
              },
              "sku": {
                "sku_number": "HJ1413_8",
                "item_name": "skuname",
                "item_description": ""
              }
            }
          },
          {
            "fields": {
              "string_7": "",
              "string_12": "",
              "string_13": ""
            },
            "sampled_inspected": "614",
            "inspection_result_id": 1,
            "inspection_status_id": 3,
            "qty_inspected": 614,
            "inspection_completed_date": "2023-05-15T16:00:00.",
            "total_inspection_minutes": 480,
            "sampling_size": 80,
            "qty_to_inspect": 1000,
            "aql_minor": 2.5,
            "aql_major": 1.5,
            "aql_major_a": 1,
            "aql_major_b": 1,
            "aql_critical": 0.01,
            "supplier_booking_msg": "",
            "assignment": {
              "report_type": {
                "id": 9
              },
              "inspector": {
                "username": "hsilevel1-1"
              },
              "date_inspection": "2023-05-15T07:00:00.",
              "inspection_level": "100%inspection",
              "inspection_method": "normal"
            },
            "po_line": {
              "qty": 614,
              "etd": "2023-02-15T00:00:00",
              "eta": "2023-02-15T00:00:00",
              "color": "CORE BLACK / CORE BLACK / CARBON S18",
              "size": "8-",
              "style": "KAPTIR 2.0 M",
              "po": {
                "exporter": {
                  "id": 263,
                  "erp_business_id": "28Y"
                },
                "po_number": "0131850088",
                "customer_po": "",
                "importer": {
                  "id": 215,
                  "erp_business_id": "Adidas001"
                },
                "project": {
                  "id": 2062
                }
              },
              "sku": {
                "sku_number": "HJ1413_8-",
                "item_name": "skuname",
                "item_description": ""
              }
            }
          },
          {
            "fields": {
              "string_7": "",
              "string_12": "",
              "string_13": ""
            },
            "sampled_inspected": "640",
            "inspection_result_id": 1,
            "inspection_status_id": 3,
            "qty_inspected": 640,
            "inspection_completed_date": "2023-05-15T16:00:00.",
            "total_inspection_minutes": 480,
            "sampling_size": 80,
            "qty_to_inspect": 1000,
            "aql_minor": 2.5,
            "aql_major": 1.5,
            "aql_major_a": 1,
            "aql_major_b": 1,
            "aql_critical": 0.01,
            "supplier_booking_msg": "",
            "assignment": {
              "report_type": {
                "id": 9
              },
              "inspector": {
                "username": "hsilevel1-1"
              },
              "date_inspection": "2023-05-15T07:00:00.",
              "inspection_level": "100%inspection",
              "inspection_method": "normal"
            },
            "po_line": {
              "qty": 640,
              "etd": "2023-02-15T00:00:00",
              "eta": "2023-02-15T00:00:00",
              "color": "CORE BLACK / CORE BLACK / CARBON S18",
              "size": "9",
              "style": "KAPTIR 2.0 M",
              "po": {
                "exporter": {
                  "id": 263,
                  "erp_business_id": "28Y"
                },
                "po_number": "0131850088",
                "customer_po": "",
                "importer": {
                  "id": 215,
                  "erp_business_id": "Adidas001"
                },
                "project": {
                  "id": 2062
                }
              },
              "sku": {
                "sku_number": "HJ1413_9",
                "item_name": "skuname",
                "item_description": ""
              }
            }
          },
          {
            "fields": {
              "string_7": "",
              "string_12": "",
              "string_13": ""
            },
            "sampled_inspected": "313",
            "inspection_result_id": 1,
            "inspection_status_id": 3,
            "qty_inspected": 313,
            "inspection_completed_date": "2023-05-15T16:00:00.",
            "total_inspection_minutes": 480,
            "sampling_size": 80,
            "qty_to_inspect": 1000,
            "aql_minor": 2.5,
            "aql_major": 1.5,
            "aql_major_a": 1,
            "aql_major_b": 1,
            "aql_critical": 0.01,
            "supplier_booking_msg": "",
            "assignment": {
              "report_type": {
                "id": 9
              },
              "inspector": {
                "username": "hsilevel1-1"
              },
              "date_inspection": "2023-05-15T07:00:00.",
              "inspection_level": "100%inspection",
              "inspection_method": "normal"
            },
            "po_line": {
              "qty": 313,
              "etd": "2023-02-15T00:00:00",
              "eta": "2023-02-15T00:00:00",
              "color": "CORE BLACK / CORE BLACK / CARBON S18",
              "size": "9-",
              "style": "KAPTIR 2.0 M",
              "po": {
                "exporter": {
                  "id": 263,
                  "erp_business_id": "28Y"
                },
                "po_number": "0131850088",
                "customer_po": "",
                "importer": {
                  "id": 215,
                  "erp_business_id": "Adidas001"
                },
                "project": {
                  "id": 2062
                }
              },
              "sku": {
                "sku_number": "HJ1413_9-",
                "item_name": "skuname",
                "item_description": ""
              }
            }
          }
        ],
        "passFails": [
          {
            "title": "mcs_availability_&_signature_compliance",
            "value": "yes",
            "type": "check-list",
            "subsection": "validation",
            "checkListSubsection": "1_general_compliance",
            "status": "pass",
            "comment": ""
          },
          {
            "title": "shas_compliance",
            "value": "yes",
            "type": "check-list",
            "subsection": "validation",
            "checkListSubsection": "1_general_compliance",
            "status": "pass",
            "comment": ""
          },
          {
            "title": "a_01_compliance",
            "value": "yes",
            "type": "check-list",
            "subsection": "validation",
            "checkListSubsection": "1_general_compliance",
            "status": "pass",
            "comment": ""
          },
          {
            "title": "cpsia_compliance",
            "value": "no",
            "type": "check-list",
            "subsection": "validation",
            "checkListSubsection": "1_general_compliance",
            "status": "fail",
            "comment": ""
          },
          {
            "title": "customer_country_specific_compliance",
            "value": "n/a",
            "type": "check-list",
            "subsection": "validation",
            "checkListSubsection": "1_general_compliance",
            "status": "na",
            "comment": ""
          },
          {
            "title": "production_finish_goods",
            "value": "yes",
            "type": "check-list",
            "subsection": "validation",
            "checkListSubsection": "2_metal_detection_compliance",
            "status": "pass",
            "comment": ""
          },
          {
            "title": "warehouse_outer_carton",
            "value": "yes",
            "type": "check-list",
            "subsection": "validation",
            "checkListSubsection": "2_metal_detection_compliance",
            "status": "pass",
            "comment": ""
          },
          {
            "title": "production_fgt_pass",
            "value": "yes",
            "type": "check-list",
            "subsection": "validation",
            "checkListSubsection": "3_fgt_compliance",
            "status": "pass",
            "comment": ""
          },
          {
            "title": "cma_pass",
            "value": "no",
            "type": "check-list",
            "subsection": "validation",
            "checkListSubsection": "3_fgt_compliance",
            "status": "fail",
            "comment": ""
          },
          {
            "title": "uv_c_treatment",
            "value": "n/a",
            "type": "check-list",
            "subsection": "validation",
            "checkListSubsection": "4_mold_prevention",
            "status": "na",
            "comment": ""
          },
          {
            "title": "anti_mold_wrapping_paper",
            "value": "yes",
            "type": "check-list",
            "subsection": "validation",
            "checkListSubsection": "4_mold_prevention",
            "status": "pass",
            "comment": ""
          },
          {
            "title": "exceptional_visual_standard",
            "value": "n/a",
            "type": "check-list",
            "subsection": "validation",
            "checkListSubsection": "5_exceptional_management",
            "status": "na",
            "comment": ""
          },
          {
            "title": "factory_disclaimer",
            "value": "n/a",
            "type": "check-list",
            "subsection": "validation",
            "checkListSubsection": "5_exceptional_management",
            "status": "na",
            "comment": ""
          },
          {
            "title": "slip_on_inspection_pass_step_in_tool",
            "value": "no",
            "type": "check-list",
            "subsection": "checklist",
            "checkListSubsection": "1_fit",
            "status": "fail",
            "comment": ""
          },
          {
            "title": "moisture_test_aquaboy_pass",
            "value": "no",
            "type": "check-list",
            "subsection": "checklist",
            "checkListSubsection": "2_mold_prevention",
            "status": "fail",
            "comment": ""
          },
          {
            "title": "inspected_carton_numbers",
            "type": "list",
            "subsection": "actual_inspection",
            "listValues": []
          }
        ]
      }';
      echo $data;
   }
}
