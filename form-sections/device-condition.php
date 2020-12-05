<div id="conditionDiv" class="main-card uk-card uk-card-default uk-card-body uk-width-1-2@m" style="display:none;" uk-scrollspy="cls:uk-animation-slide-right">
  
        <?php include 'form-sections/dotnav.php'; ?>
      
        <h3 class="uk-card-title uk-text-center">Is the device in good condition?</h3>
  
        <div class="uk-margin uk-text-center">
            <div uk-form-custom="target: > * > span:first-child">
                <select id="device_condition" name="device_condition" onchange="if(this.value === 'No'){reject_device();return;} nav_next();">
                    <option value="">Please Select Condition</option>
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                </select>
                <button class="uk-button uk-button-default" type="button" tabindex="-1">
                    <span></span>
                    <span uk-icon="icon: chevron-down"></span>
                </button>
            </div>
        </div>
        
        <div style="text-align:center;">
         <a style="text-align:center;" uk-toggle="target: #condition_info"><span uk-icon="icon: question"></span> See what this means</a>
        </div>
          <br><br>
         <div style="width:50%;margin:auto;text-align:center;" id="condition_info"  aria-hidden="true" hidden>
           <p style="font-size:12px;">Answer yes if all of the following apply:</p>
           <ul style="font-size:12px;text-align:left;" class="uk-list uk-list-disc">
             <li>It turns on and functions normally</li>
             <li>All the buttons work</li>
             <li>The cameras work</li>
             <li>The body is free of dents and scratches</li>
             <li>The touchscreen and back glass are undamaged</li>
           </ul>
          </div>

  <?php include 'form-sections/help-footer.php'; ?>
      
    </div>