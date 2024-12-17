<div class="icons">
    <button id="musicButtonOn" class="fa fa-volume-up fa-lg icon-button"></button>
    <button id="musicButtonOff" class="fa fa-volume-off fa-lg icon-button" style="display: none;"></button>
    <audio id="backgroundMusic" loop>
        <source src="{{ asset('backsound.mp3') }}" type="audio/mp3">
        Your browser does not support the audio tag.
    </audio>
    <button class="icon-button settings"></button>
</div>    