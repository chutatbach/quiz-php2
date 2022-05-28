@extends('student.layout.main')
@section('main') 
<main class="container mt-5 card p-3">
  <div class="main__title">
    <i class="ti-bookmark-alt"></i>
    <span class="">Quiz</span>
  </div>

  <div class="alert alert-success alert-dismissible mt-3 d-flex">
    @foreach ($quizs as $quiz)
      <strong>Thời gian</strong>
      <div id="demo" class="mx-3"></div>.
    @endforeach
  </div>
  @foreach ($questions as $question)
    <div class="btn d-flex flex-column align-items-start mt-3">
      <form action="{{ __URL__ . 'user/question_answer_student/insert' }}" method="post" class="d-flex flex-column align-items-start" onsubmit="confirm('bạn chấp nhận')">
        <div class="main__title">
          <span class="text-primary">câu {{ $i }}: {{ $question->name }}?</span>
        </div>
        <input type="text" hidden value="{{  $quiz_id }}" name="quiz_id">
        <input type="text" hidden value="{{ $question->id }}" name="question_id[]">
        <div class="mx-3">
          @if (!empty($question->img))
            <img src="{{ __IMG__ . $question->img }}" width="200px" height="100px" alt="">
          @endif
        </div>

        <div class="form-check d-flex flex-column">
          @foreach ($arr[$question->id] as $answer) 
            <div class="d-flex align-items-center">
              <input type="radio" value="{{ $answer->is_correct }}" name="answer_{{ $question->id }}">
              <label class="form-check-label mx-2" for="check1">{{ $answer->content }}</label>
            </div>
          @endforeach
        </div>
    </div>
  <?php
    $i++;
  endforeach; ?>
  <div class="">
    <button type="submit" name="submit" class="btn btn-primary mt-3">Gửi câu hỏi</button>
  </div>
  </form>
</main>
@endsection
@section('page-script')
<script>
  var now = new Date();
  var entime = new Date(now);
  entime.setMinutes(now.getMinutes() + {{ $quiz->duration_minutes }})
  // entime.setSeconds(now.getSeconds()+10);
  // Set the date we're counting down to
  var countDownDate = entime.getTime();

  // Update the count down every 1 second
  var x = setInterval(function() {

    // Get today's date and time
    var now = new Date().getTime();

    // Find the distance between now and the count down date
    var distance = countDownDate - now;

    // Time calculations for days, hours, minutes and seconds
    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);

    // Display the result in the element with id="demo"
    document.getElementById("demo").innerHTML = hours + "h " +
      minutes + "m " + seconds + "s ";

    // If the count down is finished, write some text
    if (distance < 0) {
      clearInterval(x);
      $('#form-1').trigger('submit')
      document.getElementById("demo").innerHTML = "EXPIRED";
    }
  }, 1000);
</script>
@endsection

