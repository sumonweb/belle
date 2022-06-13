@if($errors->first($field))

    <div class="help-block" style="font-family: Sans-Serif; font-weight: bold;">
        {{ $errors->first($field) }}
    </div>

@endif<?php
