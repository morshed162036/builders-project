<fieldset class="mt-2">
    <h5>Select Category Level</h5>
    <div class="input-group">
        <div class="input-group-prepend">
            <span class="input-group-text" id="basic-Createon1"><i class="bx bxs-message"></i></span>
        </div>
        <select name="parent_id" id="parent_id" class="form-control" required>
            <option value="0"
                @isset($category['parent_id'])
                    @if ($category['parent_id'] == 0)
                        selected
                    @endif 
                @endisset>
                Main Category</option>
            @if (!empty($getCategories))
                @foreach ($getCategories as $item)
                    <option value="{{ $item['id'] }}"
                        @isset($category['parent_id'])
                            @if ($category['parent_id'] == $item['id'])
                                selected
                            @endif
                        @endisset>
                        {{ $item['name'] }}
                    </option>
                    @if (!empty($item['subcategories']))
                        @foreach ($item['subcategories'] as $subcategory)
                            <option value="{{ $subcategory['id'] }}"
                                @isset($category)
                                    @if ($category['parent_id'] == $subcategory['id'])
                                        selected
                                    @endif
                                @endisset>
                                &nbsp;&raquo;&nbsp;{{ $subcategory['name'] }}</option>
                        @endforeach
                    @endif
                @endforeach
            @else
                {{ 'Create Category First' }}

            @endif

        </select>
    </div>
</fieldset>
