<div id="addressDiv" class="main-card uk-card uk-card-default uk-card-body uk-width-1-2@m" style="display:none;" uk-scrollspy="cls:uk-animation-slide-right">
  
        <?php include 'form-sections/dotnav.php'; ?>
      
        <h3 class="uk-card-title uk-text-center">Where should we send the pre-paid shipping label?</h3>
  
        <a id="shipping_toggle" href="Javascript: drop_off();" class="uk-text-center">I want to drop my device off in person.</a>
  
        <br><br>
   
        <div class="uk-grid-small" uk-grid>
            <div class="uk-width-1-2@s">
                <input class="uk-input" type="text" id="first_name" name="first_name" placeholder="First Name" required>
            </div>
            <div class="uk-width-1-2@s">
                <input class="uk-input" type="text" id="last_name" name="last_name" placeholder="Last Name" required>
            </div>
            <div class="uk-width-1-1">
                <input class="uk-input" type="text" id="email" name="email" placeholder="Email Address" required>
            </div>
            <div class="uk-width-1-2@s">
                <input class="uk-input" type="text" id="street_address" name="street_address" placeholder="Street Address" required>
            </div>
            <div class="uk-width-1-2@s">
                <input class="uk-input" type="text" id="street_address_2" name="street_address_2" placeholder="Street Address 2">
            </div>
            <div class="uk-width-1-3@s">
                <input class="uk-input" type="text" id="city" name="city" placeholder="City" required>
            </div>
            <div class="uk-width-1-3@s">
                <input class="uk-input" type="text" id="state" name="state" placeholder="State" required>
            </div>
            <div class="uk-width-1-3@s">
                <input class="uk-input" type="text" id="zip" name="zip" placeholder="Zip Code" required>
            </div>
            <div class="uk-width-1-2@s">
                <input class="uk-input" type="text" id="phone" name="phone" placeholder="Phone Number" required>
            </div>
            <div class="uk-width-1-2@s">
                <input class="uk-input" type="text" id="alt_phone" name="alt_phone" placeholder="Alt. Phone Number">
            </div>
            <div class="uk-width-1-1@s" style="text-align:center;">
                <button type="button" class="uk-button uk-button-primary" onclick="prep_review();">
                  Continue
                </button>
            </div>
        </div>

      <?php include 'form-sections/help-footer.php'; ?>
      
    </div>