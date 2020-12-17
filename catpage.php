<?php

if (isset($_REQUEST['id'])) {
    session_start();
    include_once "class/Dbcon.php";
    include_once "class/Product.php";
    include "header.php";
    $db= new Dbcon();
    $prod = new Product();
    $id = $_REQUEST['id']; ?>
    <!---header--->
        <!---singleblog--->
                <div class="content">
                <?php
                                $details1 =$prod->showCategoryname($id, $db->conn);
    foreach ($details1 as $k1 =>$v1) {?>
                <?php echo $v1['html'];?>
                <?php } ?>
                    


                    <div class="tab-prices">
                        <div class="container">
                            <div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
                                <ul id="myTab" class="nav nav-tabs left-tab" role="tablist">
                                    <li role="presentation" class="active"><a href="#home" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true">IN Hosting</a></li>
                                    <li role="presentation"><a href="#profile" role="tab" id="profile-tab" data-toggle="tab" aria-controls="profile">US Hosting</a></li>
                                    </ul>
                                <div id="myTabContent" class="tab-content">
                                    <div role="tabpanel" class="tab-pane fade in active" id="home" aria-labelledby="home-tab">
                                        <div class="linux-prices">
                                            
                                            <?php $details =$prod->singleproduct($id, $db->conn);
    foreach ($details as $key=> $value) {?>
                                            <div class="col-md-3 linux-price">
                                            <div class="linux-top">
                                                <h4><?php echo $value['prod_name']; ?></h4>
                                                </div>
                                                <div class="linux-bottom">
                                                    <h5>$<?php echo $value['mon_price']; ?> <span class="month"> per month</span></h5>
                                                    <h5>$<?php echo $value['annual_price']?><span class="month"> per year</span></h5>
                                                    <?php $desc = $value['description'];
                                                    $desc_decode = json_decode($desc);
                                                    $webspace=$desc_decode->webspace;
                                                    $bandwidth = $desc_decode->bandwidth;
                                                    $domain = $desc_decode->domain;
                                                    $launguage = $desc_decode->launguage;
                                                    $mail_box = $desc_decode->mail_box;?>
                                                    <h6><?php echo $domain?> Domain</h6>
                                                    <ul>
                                                    <li><strong><?php echo $webspace; ?>gb</strong> Disk Space</li>
                                                    <li><strong><?php echo $bandwidth;?>gb</strong> Data Transfer</li>
                                                    <li><strong><?php echo $mail_box;?></strong> Email Accounts</li>
                                                    <li>Launguage Support:<strong><?php echo $launguage;?></strong></li>
                                                    <!-- <li><strong>Includes </strong>  Global CDN</li>
                                                    <li><strong>High Performance</strong>  Servers</li> -->
                                                    <li><strong>location</strong> : <img src="images/india.png"></li>
                                                    </ul>
                                                </div>
                                                <a href="cart.php?id=<?php echo $value['prod_id'] ?>">buy now</a>
                                            </div>
                                            <?php } ?>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                    <div role="tabpanel" class="tab-pane fade" id="profile" aria-labelledby="profile-tab">
                                        <div class="linux-prices">

                                            <div class="col-md-3 linux-price">
                                                <div class="linux-top us-top">
                                                <h4>Standard</h4>
                                                </div>
                                                <div class="linux-bottom us-bottom">
                                                    <h5>$259 <span class="month">per month</span></h5>
                                                    <h6>Single Domain</h6>
                                                    <ul>
                                                    <li><strong>Unlimited</strong> Disk Space</li>
                                                    <li><strong>Unlimited</strong> Data Transfer</li>
                                                    <li><strong>Unlimited</strong> Email Accounts</li>
                                                    <li><strong>Includes </strong>  Global CDN</li>
                                                    <li><strong>High Performance</strong>  Servers</li>
                                                    <li><strong>location</strong> : <img src="images/us.png"></li>
                                                    </ul>
                                                </div>
                                                <a href="#" class="us-button">buy now</a>
                                            </div>
                                            <div class="col-md-3 linux-price">
                                                <div class="linux-top us-top">
                                                <h4>Advanced</h4>
                                                </div>
                                                <div class="linux-bottom us-bottom">
                                                    <h5>$359 <span class="month">per month</span></h5>
                                                    <h6>2 Domains</h6>
                                                    <ul>
                                                    <li><strong>Unlimited</strong> Disk Space</li>
                                                    <li><strong>Unlimited</strong> Data Transfer</li>
                                                    <li><strong>Unlimited</strong> Email Accounts</li>
                                                    <li><strong>Includes </strong>  Global CDN</li>
                                                    <li><strong>High Performance</strong>  Servers</li>
                                                    <li><strong>location</strong> : <img src="images/us.png"></li>
                                                    </ul>
                                                </div>
                                                <a href="#" class="us-button">buy now</a>
                                            </div>
                                            <div class="col-md-3 linux-price">
                                                <div class="linux-top us-top">
                                                <h4>Business</h4>
                                                </div>
                                                <div class="linux-bottom us-bottom">
                                                    <h5>$539 <span class="month">per month</span></h5>
                                                    <h6>3 Domains</h6>
                                                    <ul>
                                                    <li><strong>Unlimited</strong> Disk Space</li>
                                                    <li><strong>Unlimited</strong> Data Transfer</li>
                                                    <li><strong>Unlimited</strong> Email Accounts</li>
                                                    <li><strong>Includes </strong>  Global CDN</li>
                                                    <li><strong>High Performance</strong>  Servers</li>
                                                    <li><strong>location</strong> : <img src="images/us.png"></li>
                                                    </ul>
                                                </div>
                                                <a href="#" class="us-button">buy now</a>
                                            </div>
                                            <div class="col-md-3 linux-price">
                                                <div class="linux-top us-top">
                                                <h4>Pro</h4>
                                                </div>
                                                <div class="linux-bottom us-bottom">
                                                    <h5>$639 <span class="month">per month</span></h5>
                                                    <h6>Unlimited Domains</h6>
                                                    <ul>
                                                    <li><strong>Unlimited</strong> Disk Space</li>
                                                    <li><strong>Unlimited</strong> Data Transfer</li>
                                                    <li><strong>Unlimited</strong> Email Accounts</li>
                                                    <li><strong>Includes </strong>  Global CDN</li>
                                                    <li><strong>High Performance</strong>  Servers</li>
                                                    <li><strong>location</strong> : <img src="images/us.png"></li>
                                                    </ul>
                                                </div>
                                                <a href="#" class="us-button">buy now</a>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- clients -->
                <div class="clients">
                    <div class="container">
                        <h3>Some of our satisfied clients include...</h3>
                        <ul>
                            <li><a href="#"><img src="images/c1.png" title="disney" /></a></li>
                            <li><a href="#"><img src="images/c2.png" title="apple" /></a></li>
                            <li><a href="#"><img src="images/c3.png" title="microsoft" /></a></li>
                            <li><a href="#"><img src="images/c4.png" title="timewarener" /></a></li>
                            <li><a href="#"><img src="images/c5.png" title="disney" /></a></li>
                            <li><a href="#"><img src="images/c6.png" title="sony" /></a></li>
                        </ul>
                    </div>
                </div>
       <!-- clients -->
                    <div class="whatdo">
                        <div class="container">
                            <h3> Features</h3>
                            <div class="what-grids">
                                <div class="col-md-4 what-grid">
                                    <div class="what-left">
                                    <i class="glyphicon glyphicon-cog" aria-hidden="true"></i>
                                    </div>
                                    <div class="what-right">
                                        <h4>Expert Web Design</h4>
                                        <p>Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore </p>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="col-md-4 what-grid">
                                    <div class="what-left">
                                    <i class="glyphicon glyphicon-dashboard" aria-hidden="true"></i>
                                    </div>
                                    <div class="what-right">
                                        <h4>Expert Web Design</h4>
                                        <p>Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore </p>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="col-md-4 what-grid">
                                    <div class="what-left">
                                    <i class="glyphicon glyphicon-stats" aria-hidden="true"></i>
                                    </div>
                                    <div class="what-right">
                                        <h4>Expert Web Design</h4>
                                        <p>Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore </p>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="what-grids">
                                <div class="col-md-4 what-grid">
                                    <div class="what-left">
                                    <i class="glyphicon glyphicon-download-alt" aria-hidden="true"></i>
                                    </div>
                                    <div class="what-right">
                                        <h4>Expert Web Design</h4>
                                        <p>Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore </p>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="col-md-4 what-grid">
                                    <div class="what-left">
                                    <i class="glyphicon glyphicon-move" aria-hidden="true"></i>
                                    </div>
                                    <div class="what-right">
                                        <h4>Expert Web Design</h4>
                                        <p>Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore </p>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="col-md-4 what-grid">
                                    <div class="what-left">
                                    <i class="glyphicon glyphicon-screenshot" aria-hidden="true"></i>
                                    </div>
                                    <div class="what-right">
                                        <h4>Expert Web Design</h4>
                                        <p>Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore </p>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>

                </div>
            <!---footer--->
            <?php require "footer.php";
} else {
    header("location:index.php");
}?>