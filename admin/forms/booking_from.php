<fieldset>
    <div class="form-group">
        <label for="RoomID">RoomID *</label>
          <input type="text" name="RoomID" value="<?php echo htmlspecialchars($edit ? $booking['RoomID'] : '', ENT_QUOTES, 'UTF-8'); ?>"   class="form-control" required="required" id = "RoomID" >
    </div>
    
    <div class="form-group">
        <label for="CustomerID">CustomerID</label>
            <input  type="text" name="CustomerID" value="<?php echo htmlspecialchars($edit ? $booking['CustomerID'] : '', ENT_QUOTES, 'UTF-8'); ?>"   class="form-control" id="CustomerID">
    </div>

    <div class="form-group">
        <label for="checkIn">checkIn</label>
            <input type="date" name="checkIn" value="<?php echo htmlspecialchars($edit ? $booking['checkIn'] : '', ENT_QUOTES, 'UTF-8'); ?>"   class="form-control"  type="text" id="checkIn">
    </div> 
    <div class="form-group">
        <label for="checkOut">checkOut</label>
            <input type="date" name="checkOut" value="<?php echo htmlspecialchars($edit ? $booking['checkOut'] : '', ENT_QUOTES, 'UTF-8'); ?>"   class="form-control"  type="text" id="checkOut">
    </div> 

    <div class="form-group text-center">
        <label></label>
        <button type="submit" class="btn btn-warning" >Save <span class="glyphicon glyphicon-send"></span></button>
    </div>            
</fieldset>
