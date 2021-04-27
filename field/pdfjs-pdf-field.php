<#
    var filename = '';
#>
<div class="pdfjs-pdf">
    <input type="hidden" name="{{data.name}}" value="{{data.value}}" readonly />
    <div class="filename"><# if (data.value) { filename = 'loading...' } #>{{ filename }}</div>
    <div class="placeholder">Please select a file</div>
    <div class="controls"><button class="pdf-select fl-builder-button fl-builder-button-small">Select</button> <button class="pdf-remove fl-builder-button fl-builder-button-small">Remove</button></div>
</div>