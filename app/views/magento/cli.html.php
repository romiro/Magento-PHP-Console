<?php
use Magento\Magento;
use Magento\PHPConsole;
?>
<div class="navbar navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container">
            <a class="brand" href="./index.php">TFSN</a>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <span class="span12">
            <h1><?php echo (Magento::$title != '') ? Magento::$title . '<a class="" href="./index.php"><i class="icon icon-remove-sign"></i></a>' : ''; ?></h1>
        </span>
    </div>
    <div class="row">
        <div class="span2">
            <div class="btn-group">
                <a class="btn dropdown-toggle btn-large btn-info" data-toggle="dropdown" href="#">
                    Projects
                    <span class="caret"></span>
                </a>
                <ul class="dropdown-menu">
                    <?php echo Magento::$projectsList ?>
                </ul>
            </div>
        </div>
        <div class="span2">
            <label class="checkbox" for="">
                <input type="checkbox" name="run_as_admin" id="run_as_admin"> Run as Admin?
            </label>
        </div>
        <div id="snippets-wrapper" class="span8">
            <h3 id="slideToggleSnippets">
                <i id="expand-snippets-icon" class="icon-plus-sign"></i>Snippets: </h3>
            <div id="expandable-snippets" style="display: none">

                <ul id="snippet-container" class="nav nav-pills nav-stacked">
                </ul>
                <script id="snippetsTemplate" type="text/x-jQuery-tmpl">
                    <li class="active row">
                        <a
                            class="load-snippet span7"
                            data-project="${snippetProject}"
                            data-label="${snippetLabel}"
                            onClick="TFSN.LocalStorageHelper.checkSnippet(this)"
                            >
                            ${snippetProject}: ${snippetLabel}
                        </a>
                        <i class="preview-snippet icon-plus-sign"></i>
                        <i class="remove-snippet icon icon-remove-sign"></i>
                        <pre class="prettyprint linenums span6 lang-php" style="display: none;">${snippetCode}</pre>
                    </li>
                </script>

                <div>
                    <button id="clearSnippets" class="btn btn-danger">Remove All Snippets <i class="icon-white icon-minus-sign"></i></button>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="span12" id="messages">
        </div>
    </div>
    <div class="row">
        <div class="span12">
            <div class="output"><pre><?php echo PHPConsole::$debugOutput ?></pre></div>
        </div>
    </div>
    <div class="row">
        <div class="span12">
            <form id="code-form" method="POST" action="">
                <div class="input">
                    <label for="editor"></label>
                    <textarea class="editor" id="editor" name="code"></textarea>
                    <div class="statusbar">
                        <span class="position">Line: 1, Column: 1</span>
                    <span class="copy">
                        Copy selection: <object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" width="110" height="14" id="clippy">
                            <param name="movie" value="clippy/clippy.swf"/>
                            <param name="allowScriptAccess" value="always" />
                            <param name="quality" value="high" />
                            <param name="scale" value="noscale" />
                            <param NAME="FlashVars" value="text=">
                            <param name="bgcolor" value="#E8E8E8">
                            <embed src="clippy/clippy.swf"
                                   width="110"
                                   height="14"
                                   name="clippy"
                                   quality="high"
                                   allowScriptAccess="always"
                                   type="application/x-shockwave-flash"
                                   pluginspage="http://www.macromedia.com/go/getflashplayer"
                                   FlashVars="text="
                                   bgcolor="#E8E8E8"
                                />
                        </object>
                    </span>
                    </div>
                </div>
                <input id="try-this" type="submit" name="subm" value="Try this!" class="btn btn-large btn-success" />
                <input id="save-snippet" type="button" name="save-snippet" value="Save Snippet!" class="btn btn-primary" />
            </form>
        </div>
    </div>
    <div class="row">
        <div class="span4">
            <div class="help">
                debug:
                &lt; foo()
                krumo(foo());
            </div>
        </div>
        <div class="span4">
            <div class="help">
                commands:
                krumo::backtrace();
                krumo::includes();
                krumo::functions();
                krumo::classes();
                krumo::defines();
            </div>
        </div>
        <div class="span4">
            <div class="help">
                misc:
                press ctrl-enter to submit
                put '#\n' on the first line to enforce
                \n line breaks (\r\n etc work too)
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">

    $(document).ready(function() {
        var localStorageKey = 'PhpSnippets';

        TFSN.LocalStorageHelper = new TFSN.LocalStorageHelper();
        TFSN.LocalStorageHelper.initialize(localStorageKey);

        $('#slideToggle').click(function() {
            $('#expandable').slideToggle();
            $('#expand-icon').toggleClass('icon-minus-sign');
        });

        $('#slideToggleSnippets').click(function() {
            $('#expandable-snippets').slideToggle();
            $('#expand-snippets-icon').toggleClass('icon-minus-sign');
        });

        $('.dropdown-toggle').dropdown()
    });

</script>