
<fieldset>
    <div class="form-group">
        <label for="username">Username *</label>
          <input type="text" name="username" value="<?php echo htmlspecialchars($edit ? $customer['username'] : '', ENT_QUOTES, 'UTF-8'); ?>" placeholder="Username" class="form-control" required="required" id = "username" >
    </div>
    
    <div class="form-group">
        <label for="email">Email</label>
            <input  type="email" name="email" value="<?php echo htmlspecialchars($edit ? $customer['email'] : '', ENT_QUOTES, 'UTF-8'); ?>" placeholder="E-Mail Address" class="form-control" id="email">
    </div>

    <div class="form-group">
        <label for="phone">Phone</label>
            <input name="phone" value="<?php echo htmlspecialchars($edit ? $customer['phone'] : '', ENT_QUOTES, 'UTF-8'); ?>" placeholder="987654321" class="form-control"  type="text" id="phone">
    </div> 

    <div class="form-group">
        <label>Number Of Guest</label>
        <input name="NoOfGuest" value="<?php echo htmlspecialchars($edit ? $customer['NoOfGuest'] : '', ENT_QUOTES, 'UTF-8'); ?>"  placeholder="Number of guests" class="form-control"  type="number">
    </div>

    <div class="form-group text-center">
        <label></label>
        <button type="submit" class="btn btn-warning" >Save <span class="glyphicon glyphicon-send"></span></button>
    </div>            
</fieldset>
