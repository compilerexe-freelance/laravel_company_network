@php

    class Sawasdee
    {
        public static function toThaiDateTime($date_input, $format = false, $short_month = false, $thai_numberic = false, $buddhist_year = true)
        {

            $year = date('Y', strtotime($date_input));
            $month = date('n', strtotime($date_input));
            $date = date('j', strtotime($date_input));
            $hour = date('H', strtotime($date_input));
            $minute = date('i', strtotime($date_input));
            $second = date('s', strtotime($date_input));

            $numberic_in_thai = ['๐', '๑', '๒', '๓', '๔', '๕', '๖', '๗', '๘', '๙'];

            $numberic_in_arabic = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];
            $thai_full_month = ["", "มกราคม", "กุมภาพันธ์", "มีนาคม", "เมษายน", "พฤษภาคม", "มิถุนายน", "กรกฏาคม", "สิงหาคม", "กันยายน", "ตุลาคม", "พฤศจิกายน", "ธันวาคม"];
            $thai_short_month = ["", "ม.ค.", "ก.พ.", "ม.ค.", "เม.ย", "พ.ค.", "มิ.ย.", "ก.ค.", "ส.ค.", "ก.ย.", "ต.ค.", "พฤ.ย.", "ธ.ค."];

            $year = $buddhist_year == true ? ($year + 543) : $year;
            $month_type = $short_month == false ? $thai_full_month[$month] : $thai_short_month[$month];
            $format = $format == false ? '%d%m%y %hนาฬิกา%iนาที%sวินาที' : $format;
            $letters = ['%d', '%m', '%y', '%h', '%i', '%s'];
            $words = [$date, $month_type, $year, $hour, $minute, $second];
            $result = str_replace($letters, $words, $format);
            return $thai_numberic == true ? str_replace($numberic_in_arabic, $numberic_in_thai, $result) : $result;
        }

        public static function readThaiCurrency($currency)
        {
            $exploded = explode('.', $currency);
            if (count($exploded) > 1 and $exploded[1] != 0) {
                $txt = SELF::readThaiNumber($exploded[0]) . 'บาท' . SELF::readThaiNumber($exploded[1]) . 'สตางค์';
            } else {
                $txt = SELF::readThaiNumber($exploded[0]) . 'บาทถ้วน';
            }
            return $txt;
        }

        public static function readThaiUnit($unit)
        {
            $number_count_thai = ["ศูนย์", "หนึ่ง", "สอง", "สาม", "สี่", "ห้า", "หก", "เจ็ด", "แปด", "เก้า"];
            $number = str_split("0123456789");
            $exploded = explode('.', $unit);
            print_r($number);
            if (count($exploded) > 1) {
                $txt = SELF::readThaiNumber($exploded[0]) . 'จุด' . str_replace($number, $number_count_thai, $exploded[1]);
            } else {
                $txt = SELF::readThaiNumber($unit);
            }
            return $txt;
        }

        public static function readThaiNumber($number)
        {
            if ($number == 0) {
                return "ศูนย์";
            } else {
                $number_group = array_map('strrev', array_reverse(str_split(strrev("$number"), 6)));
                $position_thai = ['', 'สิบ', 'ร้อย', 'พัน', 'หมื่น', 'แสน', 'ล้าน'];
                $number_count_thai = ["", "หนึ่ง", "สอง", "สาม", "สี่", "ห้า", "หก", "เจ็ด", "แปด", "เก้า"];
                $txt = "";
                for ($i = 0; $i < count($number_group); $i++) {
                    $data = str_split($number_group[$i]);
                    $find = strlen($number_group[$i]);
                    for ($len = 0; $len < strlen($number_group[$i]); $len++) {
                        if (($find - 1) == 1 and $data[$len] == 2) {
                            $txt .= 'ยี่' . $position_thai[$find - 1];
                        } elseif (($find - 1) == 1 and $data[$len] == 1) {
                            $txt .= $position_thai[$find - 1];
                        } elseif (($find - 1) == 0 and ($data[$len] == 1) and strlen($number_group[$i]) > 1 and $data[$len - 1] != 0) {
                            $txt .= 'เอ็ด' . $position_thai[$find - 1];
                        } else {
                            $txt .= $data[$len] == 0 ? $number_count_thai[$data[$len]] : $number_count_thai[$data[$len]] . $position_thai[$find - 1];
                        }
                        $find--;
                    }
                    $txt .= $i + 1 != count($number_group) ? 'ล้าน' : '';
                }
                return $txt;
            }
        }

        public static function toThaiURL($string)
        {
            $string = preg_replace("`\[.*\]`U", "", $string);
            $string = preg_replace('`&(amp;)?#?[a-z0-9]+;`i', '-', $string);
            $string = str_replace('%', '-percent', $string);
            $string = htmlentities($string, ENT_COMPAT, 'utf-8');
            $string = preg_replace("`&([a-z])(acute|uml|circ|grave|ring|cedil|slash|tilde|caron|lig|quot|rsquo|ldquo|rdquo);`i", "\\1", $string);
            $string = preg_replace(array("`[^a-z0-9ก-๙เ-า]`i", "`[-]+`"), "-", $string);
            $string = str_replace('-ldquo', '', $string);
            $string = str_replace('-rdquo', '', $string);
            return strtolower(trim($string, '-'));
        }
    }

    $create_quotation = App\CreateQuotation::find(session()->get('get_quotation_id'));
    $quotation_product = App\QuotationProduct::find($create_quotation->quotation_product_id);
    $product = App\Product::find($quotation_product->product_id);
    $count_item = 1;
    $current_page = 1;

    if ($quotation_product->array_custom_product != '[]') {
      $array_custom_product = $quotation_product->array_custom_product;
      $array_custom_product = str_replace("'", "", $array_custom_product);
      $array_custom_product = str_replace("[", "", $array_custom_product);
      $array_custom_product = str_replace("]", "", $array_custom_product);
      $array_custom_product = str_replace(" ", "", $array_custom_product);
      $array_custom_product = explode(",", $array_custom_product);

      foreach ($array_custom_product as $key => $value) {
        $id = str_replace('"', "", $value);
        $custom_product = App\CustomProduct::find($id);
        $count_item++;
      }

      $max_page = 0;
      $buffer_count_item = $count_item;
      while ($buffer_count_item >= 6) {
	    $max_page++;
	    $buffer_count_item = $buffer_count_item - 6;
      }

      if ($count_item > 3 && $count_item < 6) {
        $max_page = 2;
      }

      $total_price = 0;

    }

@endphp

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>

    <div style="width: 100%; //border: 1px solid red;">
        <img src="{{ url('images/iSiT_logo.jpg') }}" style="width: 150px; height: 100px; float: left;" alt="">

        &ensp;&ensp;<span style="font-size: 12px; font-weight: bold;">บริษัท ไอเอสไอที ดิสทริบิวชั่น จำกัด</span>
        &ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;
        &ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;
        <span style="font-size: 14px; font-weight: bold;">ใบเสนอราคา</span>
        <br>
        &ensp;&ensp;&ensp;<span style="font-size: 12px;">สำนักงานใหญ่: เลขที่ 130/7 หมู่ 3 ตำบลคลองสวนพลู อำเภอพระนครศรีอยุธยา</span><br>
        &ensp;&ensp;&ensp;<span style="font-size: 12px;">จังหวัดพระนครศรีอยุธยา 13000</span><br>
        &ensp;&ensp;&ensp;<span style="font-size: 12px;">โทรศัพท์ (+66)-35-956-655 แฟกซ์. (+66)-35-956-656 Email: admin@isit.in.th</span><br>
        &ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;
        &nbsp;
        <span style="font-size: 12px;">เลขประจำตัวผู้เสียภาษี <b>0145557001190</b></span><br>
        <div style="width: 470px; height: 157px; border: 1px solid #b3b3b3; //border-radius: 5px; float: left;">
          &ensp;<span style="font-size: 12px;"><b>ชื่อผู้ติดต่อ</b> @php echo $_POST['full_name']; @endphp</span><br>
          &ensp;<span style="font-size: 12px;"><b>ชื่อบริษัท</b>&ensp;&nbsp; @php echo $_POST['company_name']; @endphp</span><br>
          &ensp;<span style="font-size: 12px;"><b>ที่อยู่</b>&ensp;&ensp;&ensp;&ensp;&ensp;&ensp; @php echo $_POST['address']; @endphp</span>
        </div>
        <div style="width: 10px; float: left;">
          <span>&ensp;</span>
        </div>
        <div style="width: 220px; //border: 1px solid red; //border-radius: 5px;">
          <div style="border: 1px solid #b3b3b3">
             <!--<span style="font-size: 12px;"><b>&ensp;หน้าที่</b>&ensp;&ensp;&ensp;&ensp;&nbsp;&ensp;&ensp;&ensp;&ensp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; @php echo $current_page." / ".$max_page; @endphp</span><br>-->
            &ensp;<span style="font-size: 12px;"><b>เลขที่เอกสาร</b>&ensp;&ensp;&ensp;&ensp;&nbsp; @php echo sprintf("%08d", session()->get('get_quotation_id')); @endphp</span><br>
            &ensp;<span style="font-size: 12px;"><b>เงื่อนไขการชำระ</b>&nbsp; ทั่วไป</span><br>
            &ensp;<span style="font-size: 12px;"><b>วันที่หมดอายุ</b>&ensp;&ensp;&ensp;&ensp; @php echo session()->get('expired'); @endphp</span><br>
            &ensp;<span style="font-size: 12px;"><b>พนักงานขาย</b>&ensp;&ensp;&ensp;&ensp;&nbsp; ...</span><br>
            &ensp;<span style="font-size: 12px;"><b>วิธีจัดส่ง</b>&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp; ไม่ได้กำหนด</span><br>
            &ensp;<span style="font-size: 12px;"><b>ผู้พิมพ์</b>&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp; ...</span>
          </div>
        </div>
        <div style="clear: left;">
          <span style="font-size: 12px;"><b>รายละเอียดเพิ่มเติม</b></span>
        </div>
        <table style="border-collapse: collapse;">
          <thead>
            <tr>
              <th style="font-size: 12px; border: 1px solid #b3b3b3; width: 40px;">ลำดับ</th>
              <th style="font-size: 12px; border: 1px solid #b3b3b3; width: 210px;">รายละเอียด</th>
              <th style="font-size: 12px; border: 1px solid #b3b3b3; width: 100px;">รูปสินค้า</th>
              <th style="font-size: 12px; border: 1px solid #b3b3b3; width: 60px;">หน่วยนับ</th>
              <th style="font-size: 12px; border: 1px solid #b3b3b3;">จำนวน</th>
              <th style="font-size: 12px; border: 1px solid #b3b3b3; width: 40px;">แถม</th>
              <th style="font-size: 12px; border: 1px solid #b3b3b3;">ราคาต่อหน่วย</th>
              <th style="font-size: 12px; border: 1px solid #b3b3b3; width: 65px;">ส่วนลด</th>
              <th style="font-size: 12px; border: 1px solid #b3b3b3; width: 65px;">จำนวนเงิน</th>
            </tr>
          </thead>
          <tbody>

            @php
              $create_quotation = App\CreateQuotation::find(session()->get('get_quotation_id'));
              $quotation_product = App\QuotationProduct::find($create_quotation->quotation_product_id);
              $product = App\Product::find($quotation_product->product_id);
              $total_price = $total_price + $product->product_price;
              $no = 1;
            @endphp

            <tr>
              <td style='font-size: 12px; text-align: center; border: 1px solid #b3b3b3;'>@php echo $no; @endphp</td>
              <td style='font-size: 12px; text-align: center; border: 1px solid #b3b3b3;'>@php echo $product->product_name; @endphp</td>
              <td style='font-size: 12px; text-align: center; border: 1px solid #b3b3b3;'><img src="{{ url('uploads/products/'.$product->product_picture) }}" style="width: 80px; height: 100px;"></td>
              <td style='font-size: 12px; text-align: center; border: 1px solid #b3b3b3;'>PCS.</td>
              <td style='font-size: 12px; text-align: center; border: 1px solid #b3b3b3;'>1</td>
              <td style='font-size: 12px; text-align: center; border: 1px solid #b3b3b3;'></td>
              <td style='font-size: 12px; text-align: center; border: 1px solid #b3b3b3;'>@php echo number_format($product->product_price, 2); @endphp</td>
              <td style='font-size: 12px; text-align: center; border: 1px solid #b3b3b3;'></td>
              <td style='font-size: 12px; text-align: center; border: 1px solid #b3b3b3;'>@php echo number_format($product->product_price, 2); @endphp</td>
            </tr>

            @php
                if ($quotation_product->array_custom_product != '[]' && $quotation_product->array_custom_product != null) {
                  $array_custom_product = $quotation_product->array_custom_product;
                  $array_custom_product = str_replace("'", "", $array_custom_product);
                  $array_custom_product = str_replace("[", "", $array_custom_product);
                  $array_custom_product = str_replace("]", "", $array_custom_product);
                  $array_custom_product = str_replace(" ", "", $array_custom_product);
                  $array_custom_product = explode(",", $array_custom_product);

                  foreach ($array_custom_product as $key => $value) {
                    $id = str_replace('"', "", $value);
                    $custom_product = App\CustomProduct::find($id);
                    $no++;
                    echo "
                    <tr>
                      <td style='font-size: 12px; text-align: center; border: 1px solid #b3b3b3;'>". $no ."</td>
                      <td style='font-size: 12px; text-align: center; border: 1px solid #b3b3b3;'>". $custom_product->product_name ."</td>
                      <td style='font-size: 12px; text-align: center; border: 1px solid #b3b3b3;'><img src=\"uploads/products/". $custom_product->product_picture ."\" style=\"width: 80px; height: 100px;\"></td>
                      <td style='font-size: 12px; text-align: center; border: 1px solid #b3b3b3;'>PCS.</td>
                      <td style='font-size: 12px; text-align: center; border: 1px solid #b3b3b3;'>1</td>
                      <td style='font-size: 12px; text-align: center; border: 1px solid #b3b3b3;'></td>
                      <td style='font-size: 12px; text-align: center; border: 1px solid #b3b3b3;'>". number_format($custom_product->product_price, 2) ."</td>
                      <td style='font-size: 12px; text-align: center; border: 1px solid #b3b3b3;'></td>
                      <td style='font-size: 12px; text-align: center; border: 1px solid #b3b3b3;'>". number_format($custom_product->product_price, 2) ."</td>
                    </tr>
                    ";
                    $total_price = $total_price + $custom_product->product_price;
                  }
                }
            @endphp

            <tr>
              <td colspan="9" style='font-size: 12px; padding-top: 10px; padding-bottom: 10px; border: 1px solid #b3b3b3;'>
                  &ensp; # คือ สินค้าที่ยกเว้นภาษีมูลค่าเพิ่ม
                  &ensp;&ensp;&ensp;&ensp;&ensp;&ensp;
                  &ensp;&ensp;&ensp;&ensp;&ensp;&ensp;
                  &ensp;&ensp;&ensp;&ensp;&ensp;&ensp;
                  &ensp;&ensp;&ensp;&ensp;&ensp;&ensp;
                  &ensp;&ensp;&ensp;&ensp;&ensp;&ensp;
                  &ensp;&ensp;&ensp;&ensp;&ensp;&ensp;
                  &ensp;&ensp;&ensp;&ensp;&ensp;&ensp;
                  &ensp;&ensp;&ensp;&ensp;&ensp;&ensp;
                   รวมหน้านี้
                  &ensp;&ensp;&ensp;&ensp;&ensp;&ensp;
                  &ensp;&ensp;&ensp;&ensp;&ensp;&ensp;
                  @php echo number_format($total_price, 2); @endphp<br><br>
                  &ensp; รวมจำนวนชิ้น @php echo $no; @endphp ชิ้น รวมจำนวนรายการ @php echo $no; @endphp รายการ
                  &ensp;&ensp;&ensp;&ensp;&ensp;&ensp;
                  &ensp;&ensp;&ensp;&ensp;&ensp;&ensp;
                  &ensp;&ensp;&ensp;&ensp;&ensp;&ensp;
                  &ensp;&ensp;&ensp;&ensp;&ensp;&ensp;
                  &ensp;&ensp;&ensp;&ensp;&ensp;&ensp;
                  &ensp;&ensp;&ensp;&ensp;&ensp;&ensp;
                   รวมทั้งหมด
                  &ensp;&ensp;&ensp;&ensp;&ensp;&ensp;
                  &ensp;&ensp;&ensp;&nbsp;&nbsp;
                  @php echo number_format($total_price, 2); @endphp
              </td>
            </tr>

          </tbody>
        </table>

        @php

            $buffer_count_item = $count_item;
            while ($buffer_count_item >= 6) {
                $buffer_count_item = $buffer_count_item - 6;
            }
            if ($buffer_count_item == 1) {
                echo "<div style='margin-top: 800px;'>&ensp;</div>";
            } else if($buffer_count_item == 2) {
                echo "<div style='margin-top: 700px;'>&ensp;</div>";
            } else if($buffer_count_item == 3) {
                echo "<div style='margin-top: 600px;'>&ensp;</div>";
            } else if($buffer_count_item == 4) {
                echo "<div style='margin-top: 500px;'>&ensp;</div>";
            } else if($buffer_count_item == 5) {
                echo "<div style='margin-top: 400px;'>&ensp;</div>";
            } else if($buffer_count_item == 0) {
                echo "<div style='margin-top: 300px;'>&ensp;</div>";
            }
        @endphp

        <img src="{{ url('images/iSiT_logo.jpg') }}" style="width: 150px; height: 100px; float: left;" alt="">

        &ensp;&ensp;<span style="font-size: 12px; font-weight: bold;">บริษัท ไอเอสไอที ดิสทริบิวชั่น จำกัด</span>
        &ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;
        &ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;
        <span style="font-size: 14px; font-weight: bold;">ใบเสนอราคา</span>
        <br>
        &ensp;&ensp;&ensp;<span style="font-size: 12px;">สำนักงานใหญ่: เลขที่ 130/7 หมู่ 3 ตำบลคลองสวนพลู อำเภอพระนครศรีอยุธยา</span><br>
        &ensp;&ensp;&ensp;<span style="font-size: 12px;">จังหวัดพระนครศรีอยุธยา 13000</span><br>
        &ensp;&ensp;&ensp;<span style="font-size: 12px;">โทรศัพท์ (+66)-35-956-655 แฟกซ์. (+66)-35-956-656 Email: admin@isit.in.th</span><br>
        &ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;
        &nbsp;
        <span style="font-size: 12px;">เลขประจำตัวผู้เสียภาษี <b>0145557001190</b></span><br>
        <div style="width: 470px; height: 157px; border: 1px solid #b3b3b3; //border-radius: 5px; float: left;">
            &ensp;<span style="font-size: 12px;"><b>ชื่อผู้ติดต่อ</b> @php echo $_POST['full_name']; @endphp</span><br>
            &ensp;<span style="font-size: 12px;"><b>ชื่อบริษัท</b>&ensp;&nbsp; @php echo $_POST['company_name']; @endphp</span><br>
            &ensp;<span style="font-size: 12px;"><b>ที่อยู่</b>&ensp;&ensp;&ensp;&ensp;&ensp;&ensp; @php echo $_POST['address']; @endphp</span>
        </div>
        <div style="width: 10px; float: left;">
            <span>&ensp;</span>
        </div>
        <div style="width: 220px; //border: 1px solid red; //border-radius: 5px;">
            <div style="border: 1px solid #b3b3b3">
                <!--<span style="font-size: 12px;"><b>&ensp;หน้าที่</b>&ensp;&ensp;&ensp;&ensp;&nbsp;&ensp;&ensp;&ensp;&ensp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; @php echo $current_page." / ".$max_page; @endphp</span><br>-->
                &ensp;<span style="font-size: 12px;"><b>เลขที่เอกสาร</b>&ensp;&ensp;&ensp;&ensp;&nbsp; @php echo sprintf("%08d", session()->get('get_quotation_id')); @endphp</span><br>
                &ensp;<span style="font-size: 12px;"><b>เงื่อนไขการชำระ</b>&nbsp; ทั่วไป</span><br>
                &ensp;<span style="font-size: 12px;"><b>วันที่หมดอายุ</b>&ensp;&ensp;&ensp;&ensp; @php echo session()->get('expired'); @endphp</span><br>
                &ensp;<span style="font-size: 12px;"><b>พนักงานขาย</b>&ensp;&ensp;&ensp;&ensp;&nbsp; ...</span><br>
                &ensp;<span style="font-size: 12px;"><b>วิธีจัดส่ง</b>&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp; ไม่ได้กำหนด</span><br>
                &ensp;<span style="font-size: 12px;"><b>ผู้พิมพ์</b>&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp; ...</span>
            </div>
        </div>

        <div style="clear: left; float: left; width: 100px; margin-top: 10px; //border: 1px solid #b3b3b3;">
            <span style="font-size: 12px;"><b>หมายเหตุ</b></span>
        </div>

        <div style="float: left; margin-left: 382px; width: 218px; height: 110px; border: 1px solid #b3b3b3;">
            <span style="font-size: 12px;">&ensp; หักส่วนลด &ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp; 0.00</span><br>
            <span style="font-size: 12px;">&ensp; มูลค่าสินค้าหลังหักส่วนลด &ensp;&nbsp; @php echo number_format($total_price, 2); @endphp</span><br>
            <span style="font-size: 12px;">&ensp; มูลค่าสินค้ายกเว้นภาษี &ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp; 0.00</span><br>
            <span style="font-size: 12px;">&ensp; ภาษีมูลค่าเพิ่ม 7% &ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&nbsp;
                @php
                    $vat = 0.07 * $total_price;
                    echo number_format($vat, 2);
                @endphp
            </span>
        </div>

        <div style="clear:right; float: left; margin-top: 10px; width: 398px; height: 20px; border: 1px solid #b3b3b3;">
            <span style="font-size: 12px;">&ensp;
                @php
                    $total_price = $vat + $total_price;
                    $sawasdee = new Sawasdee;
                    echo "( ".$sawasdee->readThaiCurrency($total_price)." )";
                @endphp
            </span>
        </div>

        <div style="//float: right; margin-right: 16px; width: 300px; height: 20px; border: 1px solid #b3b3b3;">
            <span style="font-size: 12px;">&ensp; มูลค่าสุทธิ
                &ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;
                &ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;
                &ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;
                &ensp;&ensp;
            @php
                echo number_format($total_price, 2);
            @endphp
            </span>
        </div>

        <div style="clear:right; float: left; margin-top: 10px; text-align: center; border-radius: 5px; width: 200px; height: 20px; border: 1px solid #b3b3b3;">
            <span style="font-size: 12px;">&ensp; ผู้เสนอราคา</span><hr style="margin-top: 0px;">
            <span style="font-size: 12px;">(................................................)</span><br>
            <span style="font-size: 12px;">วันที่ ............../............../..............</span>
        </div>

        <div style="float: left; margin-left: 47px; text-align: center; border-radius: 5px; width: 200px; height: 20px; border: 1px solid #b3b3b3;">
            <span style="font-size: 12px;">&ensp; ผู้ตรวจสอบ</span><hr style="margin-top: 0px;">
            <span style="font-size: 12px;">(................................................)</span><br>
            <span style="font-size: 12px;">วันที่ ............../............../..............</span>
        </div>

        <div style="float: left; margin-left: 47px; text-align: center; border-radius: 5px; width: 200px; height: 20px; border: 1px solid #b3b3b3;">
            <span style="font-size: 12px;">&ensp; ผู้อนุมัติ</span><hr style="margin-top: 0px;">
            <span style="font-size: 12px;">(................................................)</span><br>
            <span style="font-size: 12px;">วันที่ ............../............../..............</span>
        </div>

    </div>

  </body>
</html>
