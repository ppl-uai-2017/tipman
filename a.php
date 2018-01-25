<div class="w3-container">

  <div class="w3-row">
    <a id='first' href="javascript:void(0)" onclick="openCity(event, 'bip');">
       
      <div class="w3-third tablink w3-bottombar w3-hover-light-grey w3-padding">Booking in Progress </div>
    </a>
    <a href="javascript:void(0)" onclick="openCity(event, 'bna');">
      
      <div class="w3-third tablink w3-bottombar w3-hover-light-grey w3-padding">Booking Need Approval</div>
    </a>
    <a href="javascript:void(0)" onclick="openCity(event, 'bh');">
       
      <div class="w3-third tablink w3-bottombar w3-hover-light-grey w3-padding">Booking History</div>
    </a>
    
  </div>

  <div id="bip" class="w3-container city" style="display:none">
    
    <h4 style='color:midnightblue'>Manage your booking - Booking in Progress </h4><br/>
    <div style="overflow-x:auto;"></div>
  </div>

  <div id="bna" class="w3-container city" style="display:none">
    <h4 style='color:midnightblue'>Manage your booking - Booking Need Approval</h4><br/>
    <div style="overflow-x:auto;"></div>

  </div>

  <div id="bh" class="w3-container city" style="display:none">
        <h4 style='color:midnightblue'>Manage your booking - Booking History </h4><br/>
    <div style="overflow-x:auto;"></div>
  </div>


</div>