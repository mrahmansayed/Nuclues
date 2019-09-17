  


 <div class="col-md-6">
<label class="subcategory_labeltyt">Subcategory</label>
<select class="select_subcategory" name="subcategory" id="1">
<option style="width: 60px;">Select Category</option>
@foreach($categgory as $category)
<option value="{{ $category->id }}">{{ $category->name }}</option>
@endforeach
</select>
</div>



