<fieldset class="mt-2">
    <h5>Select Category Level</h5>
    <div class="input-group">
        <div class="input-group-prepend">
            <span class="input-group-text" id="basic-Createon1"><i class="bx bxs-message"></i></span>
        </div>
        <select name="parent_id" id="parent_id"  class="form-control" required>
            <option value="0" @if ($category['parent_id'] == 0)
                selected
            @endif>Main Category</option>
            @if (!empty($getCategories))
                @foreach ($getCategories as $item)
                    <option value="{{ $item['id'] }}" @if ($category['parent_id'] == $item['id'])
                    selected
                    @endif
                    >{{ $item['category_name'] }}
                </option> 
                    @if (!empty($item['subcategories']))
                        @foreach ($item['subcategories'] as $subcategory)
                            <option value="{{ $subcategory['id'] }}" @if ($category['parent_id'] == $subcategory['id'])
                                selected
                            @endif
                            >&nbsp;&raquo;&nbsp;{{ $subcategory['category_name'] }}</option>
                        @endforeach 
                    @endif                           
                @endforeach
            @else
            {{ 'Create Category First' }}
                
            @endif

        </select>
    </div>
</fieldset>