<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
function wve_menu_help()
{
?>

    <!-- ________________________Generate shortcode HTML__________________________ -->

<h1 class="main-screen__top-heading">WP VIDEO EMBED Plugin</h1>
    
<div class="container-fluid main-screen-container-fluid">

    <div class="main-screen__plugin-body clearfix">

    <div class="col-md-12 wve-pro-offer">
        <div class="col-md-9">
            <h1>ARE YOU READY TO GO PRO?</h1>
            <span class="wve-pro-desc">Get exclusive features like timed call to actions, image overlays, and more!</span>
        </div>
        <div class="col-md-3 wve-pro-offer-btn-div">
            <button onclick="window.location='https://davidmoceri.com/advanced-video-floating-plugin';" class="wve-pro-offer-btn"><h4>Unlock All Features</h4></button><br/>
            <a href="#" class="wve-close-pro-offer">not now, thanks</a>
        </div>
    </div>

    <div class="col-sm-8">

        <h3 class="main-screen__plugin-body--main-heading">

            Create Your Video Embed Shortcode

        </h3>

            <section class="steps">

                <div class="main-screen__plugin-body-counter">

                    <h4>1</h4>

                </div>

                <div class="main-screen__plugin-body-title">

                    <h4 class="svs">SELECT YOUR VIDEO SOURCE</h4>

                </div>

                <div class="selected-video-source-icon"></div>
                    

                <div class="main-screen__plugin-body--icon">

                    <i class="glyphicon glyphicon-chevron-down icon"></i>

                </div>

                <div class="checkbox-icon"></div>

            </section>

            <section class="video-sources">

                <div class="bar"></div>

                <div class="single-video-source youtube">

                    <div class="single-video-source__name-section">

                        <i class="fa fa-youtube-play source-icon" aria-hidden="true"></i>

                        <span class="source-text">YouTube</span>

                        <span class="url-info-message clearfix">Use Share URL</span>

                    </div> <!-- ending single-video-source__name-section -->

                    <div class="single-video-source__url-section">

                        <span class="single-video-source__url-section--url youtube-url">URL:</span>

                        <input type="text" name="video_url" class="form-control single-video-source__url-section--video-url-field" placeholder="Video URL" id="youtube_url">

                        <div class="single-video-source__save-btn youtube-save-btn">

                            <button class="generic-save-button" onclick="wve_select_type('youtube')">Save</button>

                        </div>

                    </div> <!-- ending single-video-source__url-section -->
                    
                </div> <!-- ending single-video-source | youtube -->

                <br>

                <div class="single-video-source vimeo">

                    <div class="single-video-source__name-section">

                        <i class="fa fa-vimeo-square source-icon" aria-hidden="true"></i>

                        <span class="source-text">Vimeo</span>

                        <span class="url-info-message clearfix">Use Share URL</span>

                    </div>

                    <div class="single-video-source__url-section">

                        <span class="single-video-source__url-section--url vimeo-url">URL:</span>

                        <input type="text" name="video_url" class="form-control single-video-source__url-section--video-url-field" placeholder="Video URL" id="vimeo_url">

                        <div class="single-video-source__save-btn vimeo-save-btn">

                            <button class="generic-save-button" onclick="wve_select_type('vimeo')">Save</button>

                        </div>

                    </div> <!-- ending single-video-source__url-section -->

                </div> <!-- ending single-video-source | vimeo -->

                <br>
                
                <div class="single-video-source wistia">

                    <div class="single-video-source__name-section">

                        <img src="<?php echo plugins_url('../admin/assets/wistia_logo.png', __FILE__); ?>" alt="wistia logo" class="img-responsive wistia-logo">

                        <span class="source-text">Wistia</span>

                        <span class="url-info-message clearfix">iFrame URL or Hashed ID</span>

                    </div>

                    <div class="single-video-source__url-section">

                        <span class="single-video-source__url-section--url wistia-url">URL:</span>

                        <input type="text" name="video_url" class="form-control single-video-source__url-section--video-url-field" placeholder="Video URL" id="wistia_url">

                        <div class="single-video-source__save-btn wistia-save-btn">

                            <button class="generic-save-button" onclick="wve_wve_select_type('wistia')">Save</button>

                        </div>

                    </div> <!-- ending single-video-source__url-section -->

                </div> <!-- ending single-video-source | wistia -->

                <br>
                
                <div class="single-video-source media-library">

                    <div class="single-video-source__name-section">

                        <i class="fa fa-upload source-icon" aria-hidden="true"></i>

                        <span class="source-text">Upload to Media Library</span>

                        <span class="url-info-message clearfix">MP4 Videos</span>

                    </div>

                    <div class="single-video-source__url-section">

                        <span class="single-video-source__url-section--url ml-url">URL:</span>

                        <input id="upload_image_button" class="button" type="button" value="Upload Video" />
                        <input id="upload_image" type="text" name="ad_image" value="http://" class="full_text" size="35" /> 

                        <div class="single-video-source__save-btn ml-save-btn">

                            <button class="generic-save-button" onclick="wve_select_type('mp4_upload')">Save</button>

                        </div>

                    </div> <!-- ending single-video-source__url-section -->

                </div> <!-- ending single-video-source | meida-library -->

                <br>
                
                <div class="single-video-source external-link">

                    <div class="single-video-source__name-section">

                        <i class="fa fa-external-link-square source-icon" aria-hidden="true"></i>

                        <span class="source-text">URL Link to Video</span>

                        <span class="url-info-message clearfix">MP4 URL</span>

                    </div>

                    <div class="single-video-source__url-section">

                        <span class="single-video-source__url-section--url ml-url">URL:</span>

                        <input type="text" name="video_url" class="form-control single-video-source__url-section--video-url-field" placeholder="Video URL" id="mp4_url">

                        <div class="single-video-source__save-btn link-save-btn">

                            <button class="generic-save-button" onclick="wve_select_type('mp4_url')">Save</button>

                        </div>

                    </div> <!-- ending single-video-source__url-section -->

                </div> <!-- ending single-video-source | external-link -->

            </section>

            <section class="steps">

                <div class="main-screen__plugin-body-counter">

                    <h4>2</h4>

                </div>

                <div class="main-screen__plugin-body-title">

                    <h4 class="parent-heading">ADD YOUR MARKETING MESSAGE</h4>

                </div>

                <div class="enable-status"></div>
                    
                <div class="main-screen__plugin-body--icon">

                    <i class="glyphicon glyphicon-chevron-down icon"></i>

                </div>

                <div class="checkbox-icon-2"></div>

            </section>

            <section>

                <div class="marketing-message-body">

                    <ul>

                        <li>

                            <h4>Enable/Disable CTA Text</h4>

                            <div class="button-group">

                                <button class="toggle-button f-btn cta-text-status">ON</button>

                                <button class="toggle-button s-btn cta-text-status">OFF</button>

                            </div>

                        </li>

                        <li>

                            <i class="fa fa-comment" aria-hidden="true"></i>

                            <h4>Headline Text</h4>

                            <p class="char-limit">150 Chars Max</p>

                            <textarea name="headline-text" class="form-control headline-text" id="cta_headline"></textarea>

                        </li>

                        <li>

                            <i class="fa fa-comment" aria-hidden="true"></i>

                            <h4>Paragraph Text</h4>

                            <p class="char-limit">250 Chars Max</p>

                            <textarea name="para-text" class="form-control para-text" id="cta_text"></textarea>

                        </li>

                    </ul>

                    <div class="save-button">

                        <button>Save</button>

                    </div>

                </div>

            </section>

            <section class="steps">

                <div class="main-screen__plugin-body-counter">

                    <h4>3</h4>

                </div>

                <div class="main-screen__plugin-body-title">

                    <h4 class="parent-heading">SETUP AFFLIATE LINK/OFFER</h4>

                </div>

                <div class="enable-status"></div>
                    
                <div class="main-screen__plugin-body--icon">

                    <i class="glyphicon glyphicon-chevron-down icon"></i>

                </div>

                <div class="checkbox-icon-2"></div>

            </section>

            <section>

                <div class="affliate-link-body">

                    <ul>

                        <li>

                            <h4>Enable/Disable Button</h4>

                            <div class="button-group">

                                <button class="toggle-button f-btn cta-button-status">ON</button>

                                <button class="toggle-button s-btn cta-button-status">OFF</button>

                            </div>

                        </li>

                        <li>

                            <i class="fa fa-comment" aria-hidden="true"></i>

                            <h4>Button Text</h4>

                            <p class="char-limit">25 Chars Max</p>

                            <input type="text" name="affliate-btn-text" class="btn-text form-control" id="cta_url_text">

                        </li>

                        <li>

                            <i class="fa fa-comment" aria-hidden="true"></i>

                            <h4>Affliate Link/URL</h4>

                            <input type="text" class="aff-link form-control" name="affliate-link" id="cta_url">

                        </li>

                    </ul>

                    <div class="save-button">

                        <button class="">Save</button>

                    </div>

                </div>

            </section>


            <section class="steps">

                <div class="main-screen__plugin-body-counter">

                    <h4>4</h4>

                </div>

                <div class="main-screen__plugin-body-title">

                    <h4 class="parent-heading">STYLE TEXT & ACTIONS</h4>

                </div>

                <div class="enable-status"></div>
                    
                <div class="main-screen__plugin-body--icon">

                    <i class="glyphicon glyphicon-chevron-down icon"></i>

                </div>

                <div class="checkbox-icon-2"></div>

            </section>

            <section>

                <div class="style-text-body">

                    <ul>

                        <li>

                            <h4>Follow User Down Page</h4>

                            <div class="button-group">

                                <button class="toggle-button f-btn follow-user-status">ON</button>

                                <button class="toggle-button s-btn follow-user-status">OFF</button>

                            </div>

                            <p>
                                As the user scrolls, the video will <br> automatically follow down the page.
                            </p>

                        </li>

                        <li>

                            <h4>Side to Float Down</h4>

                            <div class="button-group">

                                <button class="toggle-button f-btn float-status">LEFT</button>

                                <button class="toggle-button s-btn float-status">RIGHT</button>

                            </div>

                            <p>
                                Let the video follow the user <br> based on the left or right side of the page.
                            </p>

                        </li>

                        <li>

                            <h4>Padding from Broswer(%)</h4>

                            <input type="number" name="padding-value" class="number-width-left"  value="2" id="browser_padding">

                            <p>
                                Default padding is set to 10%. You <br> can also set to have no padding.
                            </p>

                        </li>

                        <li>

                            <h4>Enable Scroll on Mobile</h4>

                            <div class="button-group">

                                <button class="toggle-button f-btn mobile-status">ON</button>

                                <button class="toggle-button s-btn mobile-status">OFF</button>

                            </div>

                            <p>
                                We recommend to turn this off, unless you <br> want to block your content from being read.
                            </p>

                        </li>

                    </ul>

                    <hr>

                    <div class="container stlye-text-container">

                        <div class="row border-bottom-row">

                            <div class="col-sm-3 col-offset-3"></div>

                            <div class="col-sm-6"><h4>Color</h4></div>

                            <div class="col-sm-3"><h4>Size(px)</h4></div>

                        </div> <!-- ending row -->

                        <div class="row border-bottom-row">

                            <div class="col-sm-3 border-right-col">

                                <h4>Heading</h4>

                                <p>Customize Your CTA</p>

                            </div>

                            <div class="col-sm-6 style-col-pad">

                                <input type="text" value="#000" id="cta_heading_color" class="color-picker"/>

                            </div>

                            <div class="col-sm-3 style-col-pad">
                                
                                <input type="number" value="20" id="cta_heading_size" class="number-width"/>

                            </div>

                        </div> <!-- ending row -->

                        <div class="row border-bottom-row">

                            <div class="col-sm-3 border-right-col">

                                <h4>Paragraph</h4>

                                <p>Get Creative</p>

                            </div>

                            <div class="col-sm-6 style-col-pad">

                                <input type="text" value="#000" id="cta_para_color" class="color-picker"/>

                            </div>

                            <div class="col-sm-3 style-col-pad">
                                
                                <input type="number" value="14" id="cta_para_size" class="number-width"/>

                            </div>
                            
                        </div> <!-- ending row -->

                        <div class="row">

                            <div class="col-sm-3 border-right-col">

                                <h4>Button</h4>

                                <p>Create Contrast</p>

                            </div>

                            <div class="col-sm-6 style-col-pad">

                                <input type="text" value="#6ad61d" id="cta_button_color" class="color-picker"/>

                            </div>

                            <div class="col-sm-3 style-col-pad">
                                
                                <input type="number" value="14" id="cta_button_size" class="number-width"/>

                            </div>
                                
                        </div>

                        <hr>

                        <div class="advanced-settings" style="display:none;">

                        <h4 class="advanced-settings-heading">
                            <i class="fa fa-caret-square-o-down" aria-hidden="true"></i>Advanced Settings
                        </h4>

                        <ul>

                            <li>

                                <h4>Auto Play Video</h4>

                                <div class="button-group">

                                    <button class="toggle-button f-btn wve-auto-play">ON</button>

                                    <button class="toggle-button s-btn wve-auto-play">OFF</button>

                                </div>

                                <p>
                                    Available for Wistia, Youtube, <br> Viemo, and Uploads.
                                </p>

                            </li>

                            <li>

                                <h4>Allow Full Screen</h4>

                                <div class="button-group">

                                    <button class="toggle-button f-btn wve-fullscreen">ON</button>

                                    <button class="toggle-button s-btn wve-fullscreen">OFF</button>

                                </div>

                                <p>
                                    Allow user to watch video in <br> full screen mode
                                </p>

                            </li>

                            <li>

                                <h4>Pin Video to Screen</h4>

                                <div class="button-group">

                                    <button class="toggle-button f-btn wve-pin-screen">ON</button>

                                    <button class="toggle-button s-btn wve-pin-screen">OFF</button>

                                </div>

                                <br>                                

                                <div class="disable-button-group">

	                                <button class="disable-toggle-button left-btn f-btn wve-pin-side">LEFT</button>

	                                <button class="disable-toggle-button right-btn s-btn wve-pin-side">RIGHT</button>

	                            </div>

                                <p>
                                    Remove padding and places <br> video on edge of broswer.
                                </p>

                            </li>

                            <li>

                                <h4>Timed Call-to-Action</h4>

                                <div class="button-group">

                                    <button class="toggle-button f-btn wve-timed-cta">ON</button>

                                    <button class="toggle-button s-btn wve-timed-cta">OFF</button>

                                </div>

                                <div class="button-group">

                                    <input type="number" class="aff-link form-control" name="wve-timed-time" id="wve_timed_time" placeholder="Delay(seconds)">

                                </div>

                                <p>
                                    Show users the CTA headline,  <br> Text, and buttons at specified <br/> time.
                                </p>

                            </li>

                            <li>

                                <i class="fa fa-comment" aria-hidden="true"></i>

                                <h4>Overlay Image</h4>

                                <br/><span class="single-video-source__url-section--url ml-url">URL:</span>

                                <input id="upload_image_button_overlay" class="button" type="button" value="Upload Image" />
                                <input id="upload_image_overlay" type="text" name="ad_image_overlay" value="" class="full_text" size="35" /> 

                            </li>

                            <li>

                                <i class="fa fa-comment" aria-hidden="true"></i>

                                <h4>Affliate Link/URL</h4>

                                <input type="text" class="aff-link form-control" name="affliate-link-overlay" id="cta_url_overlay">

                            </li>

                            <li>

                                <i class="fa fa-comment" aria-hidden="true"></i>

                                <h4>Overlay Image Trigger Time (seconds)</h4>

                                <input type="number" class="aff-link form-control" name="affliate-link-time-overlay" id="cta_time_overlay">

                            </li>

                        </ul>

                        </div>

                    </div> <!-- ending container -->

                    <div class="save-button final-step">

                        <button>Save</button>

                    </div>

                </div> <!-- ending style-text-body -->

            </section>
            
            <section>

                <div class="short-code-body">

                    <div class="short-code-body__configuations">

                        <h3>Generate Your ShortCode</h3>

                        <h5>Name your Marketing Video</h5>

                        <input type="text" name="marketing_video_name" class="form-control" id="shortcode_name">

                        <div class="checkbox-icon-2"></div>

                        <button class="marketing-video-save-button" onclick="wvegenerate_shortcode();">Save</button>

                        <div class="loader"></div>

                    </div>
                    
                    <div class="short-code-body__generated-short-code">

                        <h5>Your Unique Video Shortcode</h5>

                        <input type="text" name="uiq_shortcode" class="form-control" id="shortcode-ready">
                        
                        <div class="checkbox-icon-2"></div>

                        <p id="copyButton" class="copy-code">Copy Code</p> 

                        <br>

                        <a href="#" class="more-info">more info</a>

                        <p class="more-info-para">You can use this on any post or page within <br> the content of where you want to show your <br> video. Your video will always play at full width <br> of the column. This is important for <br> responsive performance. </p>

                    </div>

                </div>
                <?php 
                    //$getdata = get_post_meta(6989);
                    //echo "<pre>";
                    //print_r($getdata);
                ?>

            </section>

        </div> <!-- Ending col-sm-9 -->

        <div class="col-sm-4">

            <div class="sidebar-preview" id="sidebar-preview">

                <h3>Video Sidebar Preview</h3>
            
                <div class="sidebar-preview-video-container">
                    
                </div>

                <div class="bottom-preview-wrapper">

                    <div class="sidebar-preview__video-container">
                        
                    </div>

                    <div class="sidebar-preview__heading-container">
                        
                    </div>

                    <div class="sidebar-preview__paragraph-container">
                        
                    </div>

                    <div class="sidebar-preview__button-container">
                        
                    </div>

                    <div class="sidebar-preview__arrow-container">
                        
                    </div>

                </div> <!-- ending bottom-preview-wraper -->
                
            </div> <!-- sidebar-preview -->

        </div> <!-- ending col-sm-3 -->

    </div> <!-- ending main-screen__plugin-body -->

</div> <!-- ending contiainer-fluid | main-screen-container-fluid -->

    <!-- ________________________Generate shortcode HTML__________________________ -->

<!-- Use this variable in script files to access the url path of this file -->
<script type="text/javascript">
var wve_templateUrl = '<?php echo plugins_url('../admin/assets/', __FILE__); ?>';
</script>
<?php require 'help-js.php'; ?>    
<?php
}
?>