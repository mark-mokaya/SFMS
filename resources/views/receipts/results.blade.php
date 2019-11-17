    @extends('layouts.main')
    @section('content')

        <h1>ADD RECEIPT</h1>
        <p>Upload Success <a href="/receipts">< Go Back</a>

        <div class="form_container" id="reg-Modal">
            {!! Form::open(['action' => ['ReceiptsController@update', $Receipt->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}

            
            @if(isset($Expense))
            {{Form::hidden('expense', $Expense->id)}}
            {{Form::hidden('account', $Expense->acc_id)}}
            @endif

            <p><img src="storage/receipts/{{$Receipt->img_path}}" style="max-height: 300px;"></p>

            <p>{{Form::label('amount','Enter Receipt Total')}}<br>
                {{Form::number('amount', $Receipt->amount, ['step'=>'0.01', 'min'=>'0'])}}</p>
            
            <p>{{Form::label('total','Or Select Total')}}
                <div class="results">
                    <?php
                    if(isset($_FILES['receipt'])){
                        $file_name = $_FILES['receipt']['name'];
                        $file_tmp = $_FILES['receipt']['tmp_name'];
                        move_uploaded_file($file_tmp, "scan_results/".$file_name);
                
                        $imageMagick = shell_exec('dir "\magick.exe*" /s/b');
                        $tesseract = shell_exec('dir "\tesseract.exe*" /s/b');
                
                        $imageMagick = str_replace("magick.exe","", $imageMagick);
                        $tesseract = str_replace("tesseract.exe","", $tesseract);
                
                
                        // image enhancements
                        shell_exec("cd $imageMagick");
                        shell_exec('"magick" convert -density 1000 "scan_results/'.$file_name.'" -depth 8 -strip -background white -alpha off "scan_results/result'.'.tiff"');
                
                
                        // without image enhancements
                        shell_exec("cd $tesseract");
                        shell_exec('"tesseract" "scan_results/'.$file_name.'" result1');
                
                        // with image enhancements
                        shell_exec('"tesseract" "scan_results/result'.'.tiff" result2');
                
                        // Without enhancements
                
                        if(!file_exists("result1.txt") || fopen("result1.txt", "r")){
                                $receipt1 = file("result1.txt");
                            }else{
                                die("Unable to read receipt");
                            }   
                        //With enhancements
                
                            if(!file_exists("result2.txt") || fopen("result2.txt", "r")){
                                $receipt2 = file("result2.txt");
                            }else{
                                die("Unable to read receipt");
                            }
                
                            // Fetching values
                            $values = array();
                            $final = array();
                
                            foreach($receipt1 as $line){
                                $words = explode(" ", $line);
                                foreach($words as $word){
                                    $search = "[A-Z0-9]\.[A-Z0-9]{2}";
                                    if(preg_match_all("/{$search}/", $word)) {
                                        str_replace(' ', '', $word);
                                        array_push($values,number_format((float)$word,2,".",","));
                                    }
                                }
                            }
                
                            foreach($receipt2 as $line){
                                $words = explode(" ", $line);
                                foreach($words as $word){
                                    $search = "[A-Z0-9]\.[A-Z0-9]{2}";
                                    if(preg_match_all("/{$search}/", $word)) {
                                        str_replace(' ', '', $word);
                                        array_push($values,number_format((float)$word,2,".",","));
                                    }
                                }
                            }
                
                            foreach($values as $value) {
                
                                for($i = 0; $i <= strlen($value); $i++) {
                                    $char = substr($value, $i, 1);
                                    switch ($char) {
                                        case ".":
                                            break;
                                        case "O":
                                            $value = str_replace($char,0,$value);
                                            break;
                                        case "D":
                                            $value = str_replace($char,0,$value);
                                            break;
                                        case "I":
                                            $value = str_replace($char,1,$value);
                                            break;
                                        case "l":
                                            $value = str_replace($char,1,$value);
                                            break;
                                        case "Z":
                                            $value = str_replace($char,2,$value);
                                            break;
                                        case "e":
                                            $value = str_replace($char,0,$value);
                                            break;
                                        case "E":
                                            $value = str_replace($char,3,$value);
                                            break;
                                        case "A":
                                            $value = str_replace($char,4,$value);
                                            break;
                                        case "h":
                                            $value = str_replace($char,4,$value);
                                            break;
                                        case "S":
                                            $value = str_replace($char,5,$value);
                                            break;
                                        case "G":
                                            $value = str_replace($char,6,$value);
                                            break;
                                        case "b":
                                            $value = str_replace($char,6,$value);
                                            break;
                                        case "T":
                                            $value = str_replace($char,7,$value);
                                            break;
                                        case "j":
                                            $value = str_replace($char,7,$value);
                                            break;
                                        case "B":
                                            $value = str_replace($char,8,$value);
                                            break;
                                        case "X":
                                            $value = str_replace($char,8,$value);
                                            break;
                                        case "J":
                                            $value = str_replace($char,9,$value);
                                            break;
                                        case "g":
                                            $value = str_replace($char,9,$value);
                                            break;
                                        default:
                                            if(!is_numeric($char)){
                                                $value = str_replace($char," ",$value);
                                            }
                                    }
                                }
                
                                array_push($final,number_format((float)$value,2,".",","));
                                
                            }
                
                            foreach($final as $value){
                                
                                if(preg_match("/[A-Z0-9]\.88/", $value) || preg_match("/[A-Z0-9]\.33/", $value)) {
                                    
                                    for($i = 0; $i <= strlen($value); $i++){
                
                                        $char = substr($value, $i, 1);
                                        switch ($char) {
                                            case "8":
                                                $value = str_replace($char,0,$value);
                                                break;
                                            case "3":
                                                $value = str_replace($char,0,$value);
                                                break;
                                            default:
                                        }
                                    }
                                    array_push($final,number_format((float)$value,2,".",","));
                                }
                            }
                
                            
                            $final = array_unique($final);
                            arsort($final);

                            $i = 0;
                            foreach ($final as $Total){
                                if($i<12){
                                echo '<span style="display: inline-block; color: #000;">';
                                ?>
                                    {{Form::radio("amount", $Total)}} {{$Total}}
                                <?php
                                echo '</span>';
                                $i++;
                                } else {
                                    break;
                                }
                            }
                         } 
                    ?>
                </div>
            </p>

            {{Form::hidden('_method', 'PUT')}}
            
            <p> <input type="submit" name="action" value="ADD TOTAL">

            {!! Form::close() !!}
        </div>

@endsection
