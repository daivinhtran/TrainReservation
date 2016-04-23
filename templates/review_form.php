<form action="review.php" class="form-horizontal" method="post">
    <fieldset>
        <div class="form-group">
            <select class="form-control" id="trainNum" name = "trainNum">
            <?php foreach($train_numbers as $train_number): ?>
              <option><?= $train_number["train_number"] ?></option>
            <?php endforeach ?>
            </select>
        </div>
        <div class="form-group">
            <select class="form-control" id="rating" name = "rating">
              <option>1</option>
              <option>2</option>
              <option>3</option>
              <option>4</option>
              <option>5</option>
            </select>
        </div>
        <div class="form-group">
            <input class="form-control" id="comment" name="comment" type="text" placeholder="Comment">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </fieldset>
</form>
