<fieldset>
    <div class="form-group">
        <label for="name">name *</label>
          <input type="text" name="name" value="<?php echo htmlspecialchars($edit ? $hotel['name'] : '', ENT_QUOTES, 'UTF-8'); ?>"   class="form-control" required="required" id = "name" >
    </div>
    
    <div class="form-group">
        <label for="address">address</label>
            <input  type="text" name="address" value="<?php echo htmlspecialchars($edit ? $hotel['address'] : '', ENT_QUOTES, 'UTF-8'); ?>"   class="form-control" id="address">
    </div>

    <div class="form-group">
        <label for="NoOfRooms">NoOfRooms</label>
            <input type="number" name="NoOfRooms" value="<?php echo htmlspecialchars($edit ? $hotel['NoOfRooms'] : '', ENT_QUOTES, 'UTF-8'); ?>"   class="form-control"  type="text" id="NoOfRooms">
    </div> 
    <div class="form-group">
        <label for="docs">docs</label>
            <input type="text" name="docs" value="<?php echo htmlspecialchars($edit ? $hotel['docs'] : '', ENT_QUOTES, 'UTF-8'); ?>"   class="form-control"  type="text" id="docs">
    </div> 

    <div class="form-group text-center">
        <label></label>
        <button type="submit" class="btn btn-warning" >Save <span class="glyphicon glyphicon-send"></span></button>
    </div>            
</fieldset>
