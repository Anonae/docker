<?php

define('COMPANY_NAME', 'Advance Web Service PLC.');
define('COMPANY_ADDRESS', '');
define('TELEPHONE', 'Tel. 02 552 6500');

define('WEBNAME', '');

define('DOMAIN', 'http://kapookvending.com');   /* Path Website */
define('SITENAME', '' . DOMAIN . '');
define('BASEURL', 'http://' . SITENAME . '/');
define('BASEURL_ADMIN', 'http://' . SITENAME . '/kpadmin/');



//define('SITEFAX','662-514-1100');
//define('SITEMAIL','info@'.SITENAME);
define('SITECOMPANY', 'บริษัท แอดวานซ์ เว็บ เซอร์วิส จำกัด (มหาชน)');
define('SITE_ADDRESS', '12/5 ซอยรามคำแหง 166 แยก 4 ถนน รามคำแหง <br>
                    แขวงมีนบุรี เขตมีนบุรี กรุงเทพมหานคร  10510');
//define('WEAREOPEN_HEADER','We are open: Mon - Sat 9.00 - 16.00');
define('WEAREOPEN_FOOTER', 'เปิดทำการ จันทร์-ศุกร์ 9.00 - 20.00 น. และ เสาร์ - อาทิตย์ 9.00 - 18.00 น.');
define('TEL_COMPANY', '+66 (02) 105 4164');
define('ENG_NAME_COMPANY', 'Advance Web Service PLC.');
define('Email_COMPANY_sale', 'sale@kapookvending.com');
define('Email_COMPANY_marketing', 'marketing@advws.com');
define('Designed_by', 'advws.com');
define('Designed_url', 'http://www.advws.com');
define('Designed_title', 'ธุรกิจ เติมเงินออนไลน์  ตู้เติมเงินมือถือ ตู้เติมเงิน บัตรเติมเงิน เครื่องเติมเงินมือถือ');



$menu['index'] = 'หน้าหลัก';
$menu['our_product'] = 'ผลิตภัณฑ์ของเรา';
$menu['marketing_plan'] = 'แผนการตลาด';
$menu['owner_vending'] = 'เจ้าของตู้ต้องทำอย่างไร';
$menu['manage_vending'] = 'บริหารจัดการตู้';
$menu['video'] = 'Video';
$menu['faq'] = 'คำถามที่พบบ่อย';
$menu['contact_us'] = 'ติตต่อเรา';
$menu['login'] = 'เข้าสู่ระบบ';

$menu['term_conditions'] = 'Term &amp; Conditions';
$menu['privacy_policy'] = 'Privacy &amp; Policy';

/* COPYRIGHT */
$year = date("Y");  /* ปีปัจจุบัน */
$web_start = 2017;   /* เว็บเปิดทำการ */

if ($web_start == 2017) {
   $web_open = date("Y");
} else {
   $web_open = $web_start . " - " . $year;
}
?>