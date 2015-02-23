<?php include('header.inc.php') ?>
<div class="content">
    <div class="content-nav">
        <div class="container">
            <div class="content-nav-title text-title">PRODUCT</div>
            <div class="content-nav-menu pull-right">
                <ul>
                    <li>HOME</li>
                    <li>PRODUCTS</li>
                    <li>WATER PURIFIER</li>
                    <li>LUX COUNTER TOP</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="pd">
            <p class="pdt ti"><strong>WATER PURIFIER LUX COUNTER TOP</strong></p>
            <div class="col-6">
                <div class="pdi"></div>
            </div>
            <div class="col-6">
                <div class="pdd">
                    <h2 class="text-title ti"><strong>LUX COUNTER TOP</strong></h2>
                    <p class="ti">เครื่องกรองน้ำดื่ม "อัจฉริยะ" ตอบโจทย์คนรุ่นใหม่ ไลฟ์ไสตล์ทันสมัย ใส่ใจสุขภาพ</p>
                    <h3 class="text-title ti"><strong>MODEL CODE : </strong>LPB-H-1</h2>
                    
                    <div class="desc">
                        <h3 class="text-title"><strong>DESCRIPTION</strong></h3>
                        
                        <p>
                            เครื่องกรองน้ำดื่ม LUX Portable เป็น เครื่องกรองน้ำดื่มระบบ UV
                            มาตรฐานระดับโลก มาพร้อม AQUAGUARD Technologyเทคโนโลยี
                            ล่าสุดของเครื่องกรองน้ำ เอกสิทธิ์เฉพาะลุกซ์ ให้คุณมั่นใจได้กับคุณภาพ
                            น้ำดื่มที่สะอาดหมดจด 99.99 % ด้วยระบบการกรอง การฆ่าเชื้อ ป้องกัน
                            การก่อตัวของเชื้อโรคอย่างครบวงจร มาพร้อมดีไซน์กระทัดรัดที่ให้คุณใช้
                            งานได้สะดวกสบาย เคลื่อนย้ายง่าย เพราะไม่ต้องติดตั้ง
                        </p>
                        
                    </div>
                    <a href="#" class="btn-pd-demo"></a>
                    <a href="#" class="btn-pd-contact"></a>
                </div>
            </div>
            
            <div ng-controller="TabController">
                <ul class="tab" ng-init="tab_bar=1" >
                    <li ng-class="{active: tab_bar == 1}"><a ng-click="tab_bar = 1" href="javascript:;">HILIGHT</a></li>
                    <li ng-class="{active: tab_bar == 2}"><a ng-click="tab_bar = 2" href="javascript:;">SPECIFICATION</a></li>
                    <li ng-class="{active: tab_bar == 3}"><a ng-click="tab_bar = 3" href="javascript:;">SUPPORT</a></li>
                </ul>
                <div class="clearfix"></div>
                <div class="tab-content">
                    <li ng-show="tab_bar == 1">
                    
                        <div>
                            <div class="col-6">
                                <div class="con-warp">
                                    <h3 class="text-title">AQUAGUARD Technology</h3>
                                    <p>
                                        เทคโนโลยีใหม่ล่าสุดของเครื่องกรองน้ำเอกสิทธิ์เฉพาะลุกซ์  ให้น้ำดื่มสะอาด
                                        หมดจด 99.99% ด้วยระบบการกรอง การฆ่าเชื้อ และป้องกันการก่อตัวของ
                                        เชื้อโรคครบวงจร
                                    </p>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="con-warp">
                                    <img src="images/hl1.png" />
                                </div>
                            </div>
                        </div>
                        
                        <div>
                            <div class="col-6">
                                <div class="con-warp">
                                    <img src="images/hl1.png" />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="con-warp">
                                    <h3 class="text-title">AQUAGUARD Technology</h3>
                                    <p>
                                        เทคโนโลยีใหม่ล่าสุดของเครื่องกรองน้ำเอกสิทธิ์เฉพาะลุกซ์  ให้น้ำดื่มสะอาด
                                        หมดจด 99.99% ด้วยระบบการกรอง การฆ่าเชื้อ และป้องกันการก่อตัวของ
                                        เชื้อโรคครบวงจร
                                    </p>
                                </div>
                            </div>
                            
                        </div>
                        
                        <div class="pdwater">
                            <p class="pdwater-head">เครื่องกรองน้ำ LUX COUNTER TOP</p>
                            <p>สามารถปรับอุณหภูมิของน้ำให้เข้าความทุกความต้องการตอบโจทย์ทุกไลฟสไลต์ของสมาชิกในครอบครัวได้อย่างลงตัว</p>
                            <ul class="pdwater-list">
                                <li class="col-6">
                                    <img src="images/water1.png" />
                                    <p><strong>น้ำอุณหภูมิปกติ (Ambient water)</strong></p>
                                    <p>ให้น้ำสะอาดในอุณหภูมิปกติได้ดั่งใจ</p>
                                </li>
                                <li class="col-6">
                                    <img src="images/water2.png" />
                                    <p><strong>น้ำอุณหภูมิปกติ (Ambient water)</strong></p>
                                    <p>ให้น้ำสะอาดในอุณหภูมิปกติได้ดั่งใจ</p>
                                </li>
                                <li class="col-6">
                                    <img src="images/water3.png" />
                                    <p><strong>น้ำอุณหภูมิปกติ (Ambient water)</strong></p>
                                    <p>ให้น้ำสะอาดในอุณหภูมิปกติได้ดั่งใจ</p>
                                </li>
                                <li class="col-6">
                                    <img src="images/water4.png" />
                                    <p><strong>น้ำอุณหภูมิปกติ (Ambient water)</strong></p>
                                    <p>ให้น้ำสะอาดในอุณหภูมิปกติได้ดั่งใจ</p>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                    
                    </li>
                    <li ng-show="tab_bar == 2">2</li>
                    <li ng-show="tab_bar == 3">3</li>
                </div>
            </div>
            
            <div class="content-detail">
                <h3>วัสดุคุณภาพมาตรฐาน Stainless steel No.304, food-grade</h3>
                <p>
                    เครื่องกรองน้ำ LUX COUNTER TOP เลือกใช้ Stainless steel คุณภาพสูง No.304, food-grade ในการผลิตถังพักน้ำร้อนและน้ำเย็น จึงทำให้มั่นใจได้ว่า
                    ตัวเครื่องจะไม่เป็นสนิม ทำให้น้ำที่ออกมาจากตัวเครื่องกรองน้ำลุกซ์ สะอาดทุกหยด เหมาะสมกับการดื่มของคุณและคนที่คุณรัก และยังสามารถนำไปประกอบ
                    อาหารได้อีกด้ว
                </p>
                <hr>
                <h3>วัสดุคุณภาพมาตรฐาน Stainless steel No.304, food-grade</h3>
                <p>
                    เครื่องกรองน้ำ LUX COUNTER TOP เลือกใช้ Stainless steel คุณภาพสูง No.304, food-grade ในการผลิตถังพักน้ำร้อนและน้ำเย็น จึงทำให้มั่นใจได้ว่า
                    ตัวเครื่องจะไม่เป็นสนิม ทำให้น้ำที่ออกมาจากตัวเครื่องกรองน้ำลุกซ์ สะอาดทุกหยด เหมาะสมกับการดื่มของคุณและคนที่คุณรัก และยังสามารถนำไปประกอบ
                    อาหารได้อีกด้ว
                </p>
                <hr>
                <h3>วัสดุคุณภาพมาตรฐาน Stainless steel No.304, food-grade</h3>
                <p>
                    เครื่องกรองน้ำ LUX COUNTER TOP เลือกใช้ Stainless steel คุณภาพสูง No.304, food-grade ในการผลิตถังพักน้ำร้อนและน้ำเย็น จึงทำให้มั่นใจได้ว่า
                    ตัวเครื่องจะไม่เป็นสนิม ทำให้น้ำที่ออกมาจากตัวเครื่องกรองน้ำลุกซ์ สะอาดทุกหยด เหมาะสมกับการดื่มของคุณและคนที่คุณรัก และยังสามารถนำไปประกอบ
                    อาหารได้อีกด้ว
                </p>
                <hr>
            </div>
            <p class="blog-relate-title text-title center"><strong>Might Be Interesting</strong></p>
            
            <div class="blog-relate3">
                <ul>
                    <li class="col-6">
                        <div class="blog-relate3-item">
                            <img src="images/demo-relate1.png">
                            <div class="caption">
                                <div class="pull-left" style="width:60%"><strong>LUX LUNCH NEW WEBSITE GRAND</strong></div>
                                <div class="pull-right center" style="width:40%">19 NOV 2014</div>
                            </div>
                        </div>
                    </li>
                    <li class="col-6">
                        <div class="blog-relate3-item">
                            <img src="images/demo-relate2.png.png">
                            <div class="caption">
                                <div class="pull-left" style="width:60%"><strong>LUX LUNCH NEW WEBSITE GRAND</strong></div>
                                <div class="pull-right center" style="width:40%">19 NOV 2014</div>
                            </div>
                            <div class="caption caption-bar">
                                <span class="sc">
                                    <i class="fa fa-twitter"></i>
                                    <i class="fa fa-facebook"></i>
                                    <i class="fa fa-google-plus"></i>
                                </span>

                                <span>
                                    <i class="fa fa-bars"></i> ENVIRONMENT
                                </span>
                                <span class="readmore">
                                    <a href="#">READ MORE</a>
                                </span>

                            </div>
                        </div>
                    </li>
                </ul>
            </div>
            
        </div>
    </div>
</div>
<?php include('footer.inc.php') ?>