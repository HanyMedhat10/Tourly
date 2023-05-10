<fieldset>
    <div class="form-group">
        <label for="NoOfBeds">NoOfBeds *</label>
          <input type="text" name="NoOfBeds" value="<?php echo htmlspecialchars($edit ? $room['NoOfBeds'] : '', ENT_QUOTES, 'UTF-8'); ?>" placeholder="NoOfBeds" class="form-control" required="required" id = "NoOfBeds" >
    </div>
    
    <div class="form-group">
        <label for="price">price</label>
            <input  type="price" name="price" value="<?php echo htmlspecialchars($edit ? $room['price'] : '', ENT_QUOTES, 'UTF-8'); ?>" placeholder="E-Mail Address" class="form-control" id="price">
    </div>

    <div class="form-group">
        <label for="typeRoom">typeRoom</label>
            <input name="typeRoom" value="<?php echo htmlspecialchars($edit ? $room['typeRoom'] : '', ENT_QUOTES, 'UTF-8'); ?>" placeholder="987654321" class="form-control"  type="text" id="typeRoom">
    </div> 

    <div class="form-group text-center">
        <label></label>
        <button type="submit" class="btn btn-warning" >Save <span class="glyphicon glyphicon-send"></span></button>
    </div>            
</fieldset>
