<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Calendar</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        <!-- Script -->
        <script src="{{ asset('js/app.js') }}" defer></script>


        <style>
            body {
                background-color: #000;
                color: white;
            }    
        </style>

    </head>
    <body>
        <div style="background-color: #222;">
            <div class="container">
                <h4 class="pt-2 pb-2">Calendar</h4>
            </div>
        </div>
        <div class="container mt-4">
            <div class="row">
                <div class="col col-lg-5">
                    <form action="event" method="POST"	 >
                        <div class="row">
                            <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text border-right-0" 
                                        style="background-color: #222; color: white; border: 0;">From</span>
                                    </div>
                                    <input type="date" class="form-control border-left-0" 
                                    style="background-color: #222; color: gray; border: 0;"  name="from_date"/>
                                    <div class="input-group-prepend ml-3">
                                            <span class="input-group-text border-right-0" 
                                            style="background-color: #222; color: white; border: 0;">To</span>
                                    </div>
                                    <input type="date" class="form-control border-left-0" 
                                    style="background-color: #222; color: gray; border: 0;" name="to_date"/>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                            <span class="input-group-text border-right-0" 
                                            style="background-color: #222; color: white; border: 0;">Event</span>
                                    </div>
                                    <input type="text" class="form-control border-left-0" 
                                    style="background-color: #222; color: gray; border: 0;" placeholder="Type any event" name="Event"/>
                                </div>
                            </div>
                            <div class="row mt-3 pl-4">
                                <div class="input-group">
                                    <div class="col">
                                        <input type="checkbox" class="form-check-input" name="mon"> 
                                        <label class="form-check-label" for="mon" style="color: white;">Mon</label>
                                    </div>
                                    <div class="col">
                                        <input type="checkbox" class="form-check-input" name="tue"> 
                                        <label class="form-check-label" for="tue" style="color: white;">Tue</label>
                                    </div>
                                    <div class="col">
                                        <input type="checkbox" class="form-check-input" name="wed"> 
                                        <label class="form-check-label" for="wed" style="color: white;">Wed</label>
                                    </div>
                                    <div class="col">
                                        <input type="checkbox" class="form-check-input" name="thu"> 
                                        <label class="form-check-label" for="thu" style="color: white;">Thu</label>
                                    </div>
                                    <div class="col">
                                        <input type="checkbox" class="form-check-input" name="fri"> 
                                        <label class="form-check-label" for="fri" style="color: white;">Fri</label>
                                    </div>
                                    <div class="col">
                                        <input type="checkbox" class="form-check-input" name="sat"> 
                                        <label class="form-check-label" for="sat" style="color: white;">Sat</label>
                                    </div>
                                    <div class="col">
                                        <input type="checkbox" class="form-check-input" name="sun"> 
                                        <label class="form-check-label" for="sun" style="color: white;">Sun</label>
                                    </div>            
                                </div>
                            </div>
                            <div class="row mt-3">
                                <button type="submit" class="btn btn-primary">Add</button>
                            </div>

                            @csrf
                    </form>
                </div>
                <div class="col col-lg-7">
                    <ul class="list-group" style="color: white;">                        
                        @foreach($lists as $list)
                            <li class="list-group-item" style="background-color: #222; font-size: 12px;">
                                {{ isset($list->has_event) ? $list->has_event : $list }}</li>
                        @endforeach
                    </ul>      
                </div> 
        </div>
    </body>
</html>
