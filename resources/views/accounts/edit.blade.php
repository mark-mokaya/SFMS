@extends('layouts.main')
@section('content')

    <div class="tab">
        <button class="tablinks" onclick="openCity(event, 'edit_account')" id="defaultOpen">Edit Account</button>
        <button class="tablinks" onclick="openCity(event, 'add_income')">Add Income</button>
        <button class="tablinks" onclick="openCity(event, 'make_transfer')">Make Transfer</button>
    </div>
        
        <!-- Tab content -->
    <div id="edit_account" class="tabcontent">
        <h1>EDIT ACCOUNT</h1>
        <div class="modal" id="reg-Modal">
            {!! Form::open(['action' => ['AccountsController@update', $account->id], 'method' => 'POST']) !!}
                <p>{{Form::label('account_name','Account Name')}}<br>
                {{Form::text('account_name', $account->acc_name)}}</p>
                
                <p>{{Form::label('account_type','Account Type')}}<br>
                {{Form::text('account_type', $account->acc_type)}}</p>

                <p>{{Form::label('amount','Amount')}}<br>
                {{Form::number('amount', $account->amount, ['step'=>'0.01', 'min'=>'0'])}}</p>

                <p>{{Form::label('description','Description')}}<br>
                {{Form::textarea('description', $account->description, ['cols' => '43', 'rows' => '5', 'style' => 'resize:none; text-align: center;'])}}</p>
                
                {{Form::hidden('_method', 'PUT')}}

                <p>{{Form::submit('EDIT ACCOUNT')}}</p>

            {!! Form::close() !!}
        </div>
    </div>

    <div id="add_income" class="tabcontent">
            <h1>ADD INCOME</h1>
            <div class="modal" id="reg-Modal">
                {!! Form::open(['action' => ['AccountsController@update', $account->id], 'method' => 'POST']) !!}
                    <p>{{Form::label('account_name','Account Name')}}<br>
                    {{Form::text('account_name', $account->acc_name)}}</p>
    
                    <p>{{Form::label('amount','Amount')}}<br>
                    {{Form::number('amount', '', ['step'=>'0.01', 'min'=>'0'])}}</p>
    
                    <p>{{Form::label('description','Description')}}<br>
                    {{Form::textarea('description', '', ['cols' => '43', 'rows' => '5', 'style' => 'resize:none; text-align: center;'])}}</p>
                    
                    {{Form::hidden('_method', 'PUT')}}
    
                    <p>{{Form::submit('ADD INCOME')}}</p>
    
                {!! Form::close() !!}
            </div>
        </div>

        <div id="make_transfer" class="tabcontent">
                <h1>MAKE TRANSFER</h1>
                <div class="modal" id="reg-Modal">
                    {!! Form::open(['action' => ['AccountsController@update', $account->id], 'method' => 'POST']) !!}
                        <p>{{Form::label('account_name','Transfer From')}}<br>
                        {{Form::text('account_name', $account->acc_name)}}</p>
        
                        <p>{{Form::label('account_name','Transfer To')}}<br>
                            {{Form::text('account_name', '')}}</p>
                        
                        <p>{{Form::label('amount','Amount')}}<br>
                        {{Form::number('amount', '', ['step'=>'0.01', 'min'=>'0'])}}</p>
        
                        <p>{{Form::label('description','Description')}}<br>
                        {{Form::textarea('description', '', ['cols' => '43', 'rows' => '5', 'style' => 'resize:none; text-align: center;'])}}</p>
                        
                        {{Form::hidden('_method', 'PUT')}}
        
                        <p>{{Form::submit('MAKE TRANSFER')}}</p>
        
                    {!! Form::close() !!}
                </div>
            </div>

        <script>
            document.getElementById("defaultOpen").click();

            function openCity(evt, cityName) {
            // Declare all variables
            var i, tabcontent, tablinks;

            // Get all elements with class="tabcontent" and hide them
            tabcontent = document.getElementsByClassName("tabcontent");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }

            // Get all elements with class="tablinks" and remove the class "active"
            tablinks = document.getElementsByClassName("tablinks");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" active", "");
            }

            // Show the current tab, and add an "active" class to the button that opened the tab
            document.getElementById(cityName).style.display = "block";
            evt.currentTarget.className += " active";
            }

        </script>

@endsection
 