@extends('welcome');
@section('title')
@endsection
@section('conteudo')
    <div class="container">
        <div class="row mt-5">
            <div class="col-8">
                <!--Destinado apenas para o formulario de pagamento -->
                <h1>floki</h1>
                <div class="quartosCardPedidos">
                    <form action="#">
                        <div class="form-row">
                           <div class="input-data">
                              <input type="text" class="inputCard" required>
                              <div class="underline"></div>
                              <label for="">Numero do cartão:</label>
                           </div>
                           <div class="input-data">
                              <input type="text" class="inputCard"  required>
                              <div class="underline"></div>
                              <label for="">Data MM/YY:</label>
                           </div>
                        </div>
                        <div class="form-row">
                           <div class="input-data">
                              <input type="text" class="inputCard"  required>
                              <div class="underline"></div>
                              <label for="">Cvv:</label>
                           </div>
                           <div class="input-data">
                              <input type="text" class="inputCard"  required>
                              <div class="underline"></div>
                              <label for="">CPF:</label>
                           </div>
                          
                        </div>
                        <div class="form-row">
                            <div class="input-data">
                               <input type="text" class="inputCard"  required>
                               <div class="underline"></div>
                               <label for="">Titular do Cartão:</label>
                            </div>

                        </div>
                        <div class="form-row">
                            <div class="input-data">

                                <select id="code" name="bancos">
                                    <option selected  value="0">Selecione um banco:</option>
                                    <option  value="1">No Wrapper</option>
                                    
                                </select>
                            </div>
                        </div>
                        
                     </form>

                </div>
            </div>
            <div class="col-3">
                <h2>Hagnar</h2>
            </div>
        </div>
    </div>
    <script src="{{ asset('https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js') }}"></script>
    <script>
        $(document).ready(function(){
            //seleciona a tag cep
            $("[name='bancos']").on("click", function () {
                
             
             
      
                //confira se não é nulo
    
             
                $.ajax({
                    
                    url: "https://brasilapi.com.br/api/banks/v1",
                    
                    type: "GET",
                    dataType: "json",
                    success: function (data) {
                        //caso seja array
                        
                        if (Array.isArray(data)) {
 
                        //foreach para percorrer todos names no json
                        data.forEach(function (item) {
                            if (item.name) {
                          
                                $("#code").append("<option>" + item.name + " código:"+ item.code + "</option> <br>");
                                
                                // Display an alert for each name (optional)
                                // alert(item.name);
                            }
                        });
                    } else {
                        console.error("Unexpected data format. Expected an array.");
                    }
                    
                        
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                        alert("Algum erro ocorreu, consulte o log.");
                    }
                });
               
            });
        });
        
    
    
</script>


@endsection
