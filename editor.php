<script>
    function setCommand(command)
    {
        var editor = document.querySelector("#editor");
        var html = document.querySelector("#html");

        document.execCommand(command);
        html.innerHTML = editor.innerHTML;
    }
</script>


<div class="container">
    <div class="row">
        <div class="col colLine">
            <button type="button" class="btn btn-primary btn-sm">
                <span class="material-symbols-outlined" onClick="setCommand('bold')">format_bold</span>
            </button>
            <button type="button" class="btn btn-primary btn-sm">
                <span class="material-symbols-outlined" onClick="setCommand('underline')">format_underlined</span>
            </button>
            <button type="button" class="btn btn-primary btn-sm">
                <span class="material-symbols-outlined" onClick="setCommand('italic')">format_italic</span>
            </button>
        </div>
    </div>
    <div class="row">
        <div class="col-2 colLine">제목</div>
        <div class="col colLine">
            <input type="text" name="title" class="form-control" placeholder="제목 입력">
        </div>
    </div>
    <div class="row">
        <div class="col colLine">
            <div id="editor" contenteditable="true" style="width:100%; height:300px; border:3px solid #FF0000;" class="rounded">editor</div>
        </div>
    </div>
    <div class="row" style="display:;">
        <div class="col colLine">
            <textarea name="html" id="html" class="form-control" rows="10" placeholder="내용 입력"></textarea
        </div>
    </div>


    <div class="row">
        <div class="col colLine">aa</div>
    </div>
    <div class="row">
        <div class="col colLine">aa</div>
    </div>
    <div class="row">
        <div class="col colLine">aa</div>
    </div>
    <div class="row">
        <div class="col colLine">aa</div>
    </div>
</div>