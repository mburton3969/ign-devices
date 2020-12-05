<div id="modelDiv" class="main-card uk-card uk-card-default uk-card-body uk-width-1-2@m" style="display:none;" uk-scrollspy="cls:uk-animation-slide-right">
  
        <?php include 'form-sections/dotnav.php'; ?>
      
        <h3 class="uk-card-title uk-text-center">What Model is it?</h3>
      
        <div class="uk-margin uk-text-center">
            <div uk-form-custom="target: > * > span:first-child">
                <select id="device_model" name="device_model" onchange="if(this.value === 'Other'){reject_device();return;} nav_next();">
                    <option value="">Please Select Model</option>
                </select>
                <button class="uk-button uk-button-default" type="button" tabindex="-1">
                    <span></span>
                    <span uk-icon="icon: chevron-down"></span>
                </button>
            </div>
        </div>

  <?php include 'form-sections/help-footer.php'; ?>
      
    </div>