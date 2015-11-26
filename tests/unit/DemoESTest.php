<?php

use Elastica\Request;

class DemoESTest extends \Codeception\TestCase\Test
{
    /**
     * @var \UnitTester
     */
    protected $tester;

    /** @var \Elastica\Client $client */
    protected $client;


    protected $sampleProductJson = '
        {
           "location_number": [
              {
                 "id": "27554",
                 "value": "TU_00009"
              }
           ],
           "vat_taxable": "1",
           "visibility": 4,
           "warranty_and_service": "Bảo hành 1 đổi 1 trong 12 tháng",
           "bestsellers": {
              "month": [
                 {
                    "category_id": "1789",
                    "rank": 9
                 }
              ],
              "year_2015": [
                 {
                    "category_id": "1789",
                    "rank": 18
                 }
              ]
           },
           "searchable_support_p24h": "0",
           "buyer": {
              "id": 19422,
              "value": "Điện tử"
           },
           "is_hot": "0",
           "quantity": 57,
           "video": "<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/Q4fzhvmemmw\" frameborder=\"0\" allowfullscreen></iframe>",
           "supplier": {
              "id": 34354,
              "value": "Chi nhánh Cty TNHH Phân Phối FPT (TP.Hà Nội) - FPT Apple"
           },
           "capacity_select": {
              "id": 21412,
              "value": "100ml"
           },
           "screen_size": {
              "id": 19936,
              "value": "4.7\""
           },
           "image": "/i/p/iphone_6_silver_front.jpg",
           "page_layout": [],
           "is_imported": [],
           "meta_keyword": "",
           "plastic_cover_suitable": "1",
           "category": [
              {
                 "id": "1789",
                 "name": "Điện Thoại - Máy Tính Bảng",
                 "url_key": "dien-thoai-may-tinh-bang",
                 "level": 2,
                 "parent_id": 2,
                 "path": "1/2/1789",
                 "include_in_menu": 1,
                 "is_default": "0",
                 "position": 2034,
                 "is_filterable": 1
              },
              {
                 "id": "1793",
                 "name": "Điện Thoại Di Động",
                 "url_key": "dien-thoai-di-dong",
                 "level": 3,
                 "parent_id": 1789,
                 "path": "1/2/1789/1793",
                 "include_in_menu": 1,
                 "is_default": "0",
                 "position": 1085,
                 "is_filterable": 1
              },
              {
                 "id": "1795",
                 "name": "Smartphone",
                 "url_key": "dien-thoai-smartphone",
                 "level": 4,
                 "parent_id": 1793,
                 "path": "1/2/1789/1793/1795",
                 "include_in_menu": 1,
                 "is_default": 1,
                 "position": 818,
                 "is_filterable": 1
              },
              {
                 "id": "2051",
                 "name": "Mới & Nổi bật",
                 "url_key": "dien-thoai-tablet-moi-va-noi-bat",
                 "level": 4,
                 "parent_id": 2057,
                 "path": "1/2/1789/2057/2051",
                 "include_in_menu": 1,
                 "is_default": "0",
                 "position": 126,
                 "is_filterable": 0
              },
              {
                 "id": "3518",
                 "name": "Điện thoại - Máy tính bảng",
                 "url_key": "dien-thoai-may-tinh-bang",
                 "level": 4,
                 "parent_id": 3516,
                 "path": "1/2/1343/3516/3518",
                 "include_in_menu": 1,
                 "is_default": "0",
                 "position": 0,
                 "is_filterable": 0
              },
              {
                 "id": "3737",
                 "name": "Sản phẩm HOT",
                 "url_key": "san-pham-hot",
                 "level": 4,
                 "parent_id": 2057,
                 "path": "1/2/1789/2057/3737",
                 "include_in_menu": 1,
                 "is_default": "0",
                 "position": 0,
                 "is_filterable": 0
              }
           ],
           "price": 16990000,
           "news_to_date": "",
           "custom_design_to": "",
           "reviews_count": 0,
           "preorderdescript": "",
           "salable": 1,
           "small_image_label": "",
           "custom_layout_update": "",
           "sales_volume": {
              "yearly": 68,
              "monthly": 11,
              "daily": 2
           },
           "tier_price": "",
           "dimensions": "138.1 x 67 x 6.9 mm",
           "list_price": 19990000,
           "cpu_speed": "1.4 GHz",
           "is_free_gift": {
              "id": 31828,
              "value": "Không"
           },
           "subtitles": [
              {
                 "id": "10947",
                 "value": "Việt"
              }
           ],
           "product_weight": "129",
           "news_from_date": "2014-11-24 00:00:00",
           "included_accessories": "Sạc, Tai nghe, Sách Hướng Dẫn, Cây lấy SIM",
           "inventory": {
              "preorder_date": null,
              "inventory_type_id": "3",
              "product_id": "121238",
              "max_sale_qty": "1",
              "min_qty": "60",
              "manage_stock": "1",
              "use_config_min_qty": "0",
              "use_config_min_sale_qty": "1",
              "qty": "-3",
              "use_config_max_sale_qty": "0",
              "id": "1508093",
              "notify_stock_qty": null,
              "use_config_manage_stock": "1",
              "use_config_notify_stock_qty": "1",
              "is_in_stock": "1",
              "min_sale_qty": "1"
           },
           "image_label": "",
           "brand": {
              "id": 17827,
              "thumbnail": "brands/Brands-16-thumb.jpg",
              "status": "1",
              "value": "APPLE",
              "url_key": "thuong-hieu/apple.html"
           },
           "meta_title": "iPhone 6 64GB - 4.7 inch/ 2 nhân 1.4 GHz/ 64GB/ 8.0MP/1810mAh",
           "special_to_date": "",
           "special_from_date": "2015-08-21 18:47:00",
           "url_path": "iphone-6-64gb-4-7-inch-2-nhan-1-4-ghz-64gb-8-0mp-1810mah-silver-hang-chinh-hang-p121238.html",
           "manufacturer_electronics": {
              "id": 12364,
              "value": "Apple"
           },
           "type": "simple",
           "dropship": "1",
           "small_image": "/i/p/iphone_6_silver_front.jpg",
           "price_restore": 0,
           "chip_set": "A8",
           "battery_life": "",
           "support_p24h": "0",
           "enable_googlecheckout": {
              "id": 1,
              "value": "Scholastic Paperbacks"
           },
           "status": 1,
           "gift_message_available": [],
           "miki_price": 0,
           "cpu": {
              "id": 19243,
              "value": "Dual-Core"
           },
           "preorder": "0",
           "item_model_number": "iPhone 6 64GB",
           "sku": "5800306958457",
           "cost": 16863636,
           "custom_design_from": "",
           "thumbnail": "/i/p/iphone_6_silver_front.jpg",
           "updated_at": "2015-08-21 19:51:32",
           "rating_summary": 0,
           "media": [
              {
                 "path": "/i/p/iphone_6_silver_front.jpg",
                 "label": null
              },
              {
                 "path": "/1/_/1_20_9.jpg",
                 "label": null
              },
              {
                 "path": "/i/p/iphone_6_silver_c_nh.jpg",
                 "label": null
              },
              {
                 "path": "/a/p/apple-iphone-6-64gb-silver-mobile-phone.png",
                 "label": null
              }
           ],
           "custom_design": [],
           "parents": [
              "121235"
           ],
           "weight": "500.0000",
           "promotion": [],
           "vat": {
              "id": 21603,
              "value": "10"
           },
           "resolution": {
              "id": 26690,
              "value": "750 x 1334 pixels"
           },
           "productset_id": 58,
           "id": 121238,
           "is_new": 0,
           "giftwrap": "1",
           "searchable_brand": "APPLE",
           "operation_system": {
              "id": 26687,
              "value": "iOS 8.0"
           },
           "options_container": {
              "id": 0,
              "value": null
           },
           "tax_class_id": [],
           "name": "iPhone 6 64GB - Silver-Hàng chính hãng FPT",
           "created_at": "2015-08-21 19:51:32",
           "url_key": "iphone-6-64gb-4-7-inch-2-nhan-1-4-ghz-64gb-8-0mp-1810mah-silver-hang-chinh-hang-p121238",
           "availability": 1,
           "preorder_date": "",
           "display_remain_day_special_price": "0",
           "charge_time": "",
           "camera": "8MP",
           "thumbnail_label": "",
           "battery_capacity": "1810mAh",
           "special_price": 16990000,
           "freegifts": [],
           "unit": {
              "id": 28014,
              "value": "Cái"
           },
           "display_color": {
              "id": 10526,
              "value": "Hơn 16 triệu màu"
           },
           "color": {
              "id": 27368,
              "value": "Silver"
           },
           "ram": {
              "id": 19471,
              "value": "1GB"
           },
           "searchable_name": "iPhone 6 64GB - Silver-Hàng chính hãng FPT",
           "warranty_lifetime": {
              "id": 19351,
              "value": "12 tháng"
           },
           "rma_status": {
              "id": 1,
              "value": "Scholastic Paperbacks"
           },
           "data_connection": [],
           "is_recurring": [],
           "display_type": {
              "id": 19472,
              "value": "IPS LCD"
           },
           "storage": "64GB"
        }
    ';

    protected function _before()
    {
        $this->client = $this->tester->getElasticaClient();

        // make sure we have no data before each test action
        try {
            // delete test index
            $this->client->request('/_all/', Request::DELETE);
        } catch (\Exception $e) {
            //pass
        }
    }

    protected function _after()
    {
    }

    protected function getTotal($data)
    {
        return isset($data['hits']['total']) ? $data['hits']['total'] : 0;
    }

    public function testElasticSearchIsWorking()
    {
        $elasticSearchStatus = $this->client->request('/', Request::GET)->getStatus();

        $this->assertEquals(200, $elasticSearchStatus);
    }

    public function testInsertingDocuments()
    {
        $randomDocs = rand(1, 10);

        $path = '/test/insert/';

        for ($i = 1; $i <= $randomDocs; $i++) {
            $this->client->request($path . $i, Request::PUT, [
                'name' => 'some random name',
                'other_attribute' => 'attribute' . uniqid(),
            ])->isOk();
        }

        // sleep, wait for all request finished
        sleep(3);

        $data = $this->client->request($path . '_search', Request::GET)->getData();

        $this->assertEquals($randomDocs, $this->getTotal($data));
    }

    public function testAutoMapping()
    {
        $path = '/test/autoMapping/';
        $productData = json_decode($this->sampleProductJson, true);

        // insert sample data
        $this->client->request($path . '1', Request::PUT, $productData);

        // retrieve mapping after insert docs
        $data = $this->client->request($path . '_mapping', Request::GET)->getData();

        // test if all fields have mapping with field has value
        foreach ($productData as $key => $value) {
            if (!empty($value)) {
                $paths = explode('/', $path);
                $this->assertArrayHasKey($key, $data[$paths[1]]['mappings'][$paths[2]]['properties']);
            }
        }
    }

    public function testOrderByNestedObjectValue()
    {
        $path = '/test/nestedObject/';

        $productData = json_decode($this->sampleProductJson, true);
        $randomDocs = rand(10, 20);

        // input sample data
        for ($i = 1; $i <= $randomDocs; $i++) {
            $productData['sales_volume']['yearly'] += 1;
            $this->client->request($path . $i, Request::PUT, $productData);
        }
        // wait for request done and index data
        sleep(5);

        // search order by sales_volume.yearly desc
        $data = $this->client->request($path . '_search', Request::POST, [
            'query' => [
                'query_string' => [
                    'query' => 'iphone',
                ]
            ],
            'sort' => [
                "sales_volume.yearly" => 'desc',  // sorting
            ],
            "size" => 20,  // retrieve all docs for test ordering, default is 10
        ])->getData();

        // check if ordering correctly
        for ($i = 0; $i < $randomDocs - 1; $i++) {
            $this->assertLessThan(
                $data['hits']['hits'][$i]['_source']['sales_volume']['yearly'],
                $data['hits']['hits'][$i + 1]['_source']['sales_volume']['yearly']
            );
        }
    }

    public function testSearchWithSynonyms()
    {
        $indexSettings = json_decode(file_get_contents(__DIR__ . '/../_data/productIndex.json'), true);

        // custom synonyms
        $synonyms = [];
        $synonyms[] = "tai nghe,headphone";
        $synonyms[] = "chụp hình,chụp ảnh";
        $indexSettings['settings']['index']['analysis']['filter']['name_synonym_filter']['synonyms'] = $synonyms;

        $path = '/test/product/';

        // create index
        $this->client->request($path, Request::PUT, $indexSettings);


        // insert data test
        $productData = json_decode($this->sampleProductJson, true);
        $productNames = [
            "tai nghe abc",
            "headphone xyz",
            "headphone tai nghe",
            "tai abc nghe",
            "wrong name",
            "gậy chụp hình abc",
            "gậy chụp ảnh xyz",
            "chụp hình cho trẻ",
            "công việc chụp ảnh",
            "ảnh hình",
        ];
        $i = 1;
        foreach ($productNames as $name) {
            $productData['searchable_name'] = $name;
            $this->client->request($path . $i++, Request::PUT, [
                'searchable_name' => $name,
                'type' => 'sample',
                'attribute' => 'any attribtue',
                'value' => rand(1, 999),
            ]);
        }

        // wait for index
        sleep(3);

        foreach ($synonyms as $syn) {
            $keywords = explode(',', $syn);
            // with unmarked field is using synonyms and not unmarked field not use
            $dataForFirstKeyword = $this->client->request($path . '_search', Request::GET, [
                'query' => [
                    'match_phrase' => [
                        'searchable_name.unmarked' => $keywords[0],
                    ]
                ]
            ])->getData();
            $dataForFirstKeywordNotUnmarked = $this->client->request($path . '_search', Request::GET, [
                'query' => [
                    'match_phrase' => [
                        'searchable_name' => $keywords[0],
                    ]
                ]
            ])->getData();

            // responses of search no synonym and search with synonyms are different
            $this->assertNotEquals($dataForFirstKeyword['hits'], $dataForFirstKeywordNotUnmarked['hits']);

            $dataForSecondKeyword = $this->client->request($path . '_search', Request::GET, [
                'query' => [
                    'match_phrase' => [
                        'searchable_name.unmarked' => $keywords[1],
                    ]
                ]
            ])->getData();

            // test responses of 2 synonym keywords are same
            $this->assertEquals($dataForFirstKeyword['hits'], $dataForSecondKeyword['hits']);
        }
    }
}