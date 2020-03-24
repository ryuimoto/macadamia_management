@extends('admin.layouts.main_layout')
@section('title')
    MM管理画面|通知設定
@endsection
@section('contents')
<div class="panel panel-default">
    <div class="panel-heading">Forms</div>
    <div class="panel-body">
        <div class="col-md-6">
            <form role="form">
                <div class="form-group">
                    <label>Text Input</label>
                    <input class="form-control" placeholder="Placeholder">
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control">
                </div>
                <div class="form-group checkbox">
                    <label>
                        <input type="checkbox">Remember me
                    </label>
                </div>
                <div class="form-group">
                    <label>File input</label>
                    <input type="file">
                    <p class="help-block">Example block-level help text here.</p>
                </div>
                <div class="form-group">
                    <label>Text area</label>
                    <textarea class="form-control" rows="3"></textarea>
                </div>
                <label>Validation</label>
                <div class="form-group has-success">
                    <input class="form-control" placeholder="Success">
                </div>
                <div class="form-group has-warning">
                    <input class="form-control" placeholder="Warning">
                </div>
                <div class="form-group has-error">
                    <input class="form-control" placeholder="Error">
                </div>
                </form></div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Checkboxes</label>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" value="">Checkbox 1
                            </label>
                        </div>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" value="">Checkbox 2
                            </label>
                        </div>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" value="">Checkbox 3
                            </label>
                        </div>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" value="">Checkbox 4
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Radio Buttons</label>
                        <div class="radio">
                            <label>
                                <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked="">Radio Button 1
                            </label>
                        </div>
                        <div class="radio">
                            <label>
                                <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">Radio Button 2
                            </label>
                        </div>
                        <div class="radio">
                            <label>
                                <input type="radio" name="optionsRadios" id="optionsRadios3" value="option3">Radio Button 3
                            </label>
                        </div>
                        <div class="radio">
                            <label>
                                <input type="radio" name="optionsRadios" id="optionsRadios3" value="option3">Radio Button 4
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Selects</label>
                        <select class="form-control">
                            <option>Option 1</option>
                            <option>Option 2</option>
                            <option>Option 3</option>
                            <option>Option 4</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Multiple Selects</label>
                        <select multiple="" class="form-control">
                            <option>Option 1</option>
                            <option>Option 2</option>
                            <option>Option 3</option>
                            <option>Option 4</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit Button</button>
                    <button type="reset" class="btn btn-default">Reset Button</button>
                </div>
            
        </div>
    </div>
@endsection
@section('script')
    <script>
        $("#notification_settings").addClass("active");
    </script>
@endsection