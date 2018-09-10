<div class="col-lg-12">
    <div class="card card-outline-primary">
        <div class="card-header">
            <h4 class="m-b-0 text-white">Atualizar Campos</h4>
        </div>
        <div class="card-body">
            <div class="form-validation">
                <?php echo form_open_multipart(base_url() . 'admin/quote_response', "class='form-valide'");?>
                <hr>
                <div class="form-group row">
                <?php if( isset($quote_response_cost[0]) && array_key_exists(0, $quote_response_cost)) : ?>
                    <?php foreach ($quote_response_cost[0] as $key => $value) : ?>
                        <?php if ($key !== "quote_answer_cost_id" && $key !== "id" && $key !== "quote_id" && $key !== "total" && $key !== "cost") : ?>
                            <div class="col-lg-2 col-md-3 col-sm-4 col-xs-12">
                                <label class="col-lg-12 col-form-label" for="<?php echo $key; ?>"><?php echo $key; ?></label>
                            </div>
                            <div class="col-lg-10 col-md-9 col-sm-8 col-xs-12" style="margin-bottom:20px">
                                <input
                                
                                    <?php if($key === "luggage" || $key === "stops") :?>
                                        type="number"
                                        step="1"
                                    <?php elseif($key === "exchange" || $key === "original_cost" || $key === "tax"  || $key === "rav") :?>
                                        type="number"
                                        step="0.01"
                                    <?php else :?>
                                        type="text"

                                    <?php endif;?>
                                    
                                    <?php if($key === "departure_datetime" || $key === "arrival_datetime") : ?>
                                        class="form-control col-lg-12 datePicker"
                                    <?php else:?>
                                        class="form-control col-lg-12"
                                    <?php endif;?>
                                    
                                    <?php if($key === "currency") :?>
                                        id="autocomplete_currency"
                                    <?php else:?>
                                        id="<?php echo $key; ?>"
                                    <?php endif;?>
                                    
                                    name="<?php echo $key; ?>"
                                    placeholder="Ex: <?php echo $key;?>"
                                    value="<?php echo $value;?>">
                            </div>
                        <?php elseif ($key === "cost") :?>
                                <input type="hidden"
                                id="<?php echo $key; ?>"
                                    name="<?php echo $key; ?>"
                                    placeholder="Ex: <?php echo $key;?>"
                                    value="<?php echo $value;?>">
                        <?php elseif ($key === "quote_id") :?>
                                <input type="hidden"
                                id="<?php echo $key; ?>"
                                    name="<?php echo $key; ?>"
                                    value="<?php echo $value;?>">
                        <?php elseif ($key === "total") :?>
                                <div class="col-lg-2 col-md-3 col-sm-4 col-xs-12">
                                   <label class="col-lg-12 col-form-label" for="<?php echo $key; ?>"><?php echo $key; ?></label>
                               </div>
                               <div class="col-lg-10 col-md-9 col-sm-8 col-xs-12" style="margin-bottom:20px">
                                  <input
                                        type="text"
                                        class="form-control col-lg-12"
                                        id="<?php echo $key; ?>"
                                        placeholder="Ex: <?php echo $key;?>"
                                        value="<?php echo $value;?>" disabled>
                                </div>
                        <?php endif; ?>
                    <?php endforeach; ?>
                <?php else : ?>
                    <div class="col-lg-2 col-md-3 col-sm-4 col-xs-12">
                        <label class="col-lg-12 col-form-label" for="localizador">Localizador</label>
                    </div>
                    <div class="col-lg-10 col-md-9 col-sm-8 col-xs-12" style="margin-bottom:20px">
                        <input type="text" class="form-control col-lg-12" id="localizador" name="localizador" placeholder="Ex: Localizador" value="">
                    </div>

                    <div class="col-lg-2 col-md-3 col-sm-4 col-xs-12">
                        <label class="col-lg-12 col-form-label" for="airline">Cia Aerea</label>
                    </div>
                    <div class="col-lg-10 col-md-9 col-sm-8 col-xs-12" style="margin-bottom:20px">
                        <input type="text" class="form-control col-lg-12" id="airline" name="airline" placeholder="Ex: Cia Aerea" value="">
                    </div>

                    <div class="col-lg-2 col-md-3 col-sm-4 col-xs-12">
                        <label class="col-lg-12 col-form-label" for="flight">Voo</label>
                    </div>
                    <div class="col-lg-10 col-md-9 col-sm-8 col-xs-12" style="margin-bottom:20px">
                        <input type="text" class="form-control col-lg-12" id="flight" name="flight" placeholder="Ex: Voo" value="">
                    </div>

                    <div class="col-lg-2 col-md-3 col-sm-4 col-xs-12">
                        <label class="col-lg-12 col-form-label" for="departure_datetime">Data de Embarque</label>
                    </div>
                    <div class="col-lg-10 col-md-9 col-sm-8 col-xs-12" style="margin-bottom:20px">
                        <input type="text" class="form-control col-lg-12 datePicker" id="departure_datetime" name="departure_datetime" placeholder="Ex: 00/00/00000" value="">
                    </div>

                    <div class="col-lg-2 col-md-3 col-sm-4 col-xs-12">
                        <label class="col-lg-12 col-form-label" for="arrival_datetime">Data de Chegada</label>
                    </div>
                    <div class="col-lg-10 col-md-9 col-sm-8 col-xs-12" style="margin-bottom:20px">
                        <input type="text" class="form-control col-lg-12 datePicker" id="arrival_datetime" name="arrival_datetime" placeholder="Ex: 00/00/00000" value="">
                    </div>

                    <div class="col-lg-2 col-md-3 col-sm-4 col-xs-12">
                        <label class="col-lg-12 col-form-label" for="class">Classe</label>
                    </div>
                    <div class="col-lg-10 col-md-9 col-sm-8 col-xs-12" style="margin-bottom:20px">
                        <input type="text" class="form-control col-lg-12" id="class" name="class" placeholder="Ex: Economica" value="">
                    </div>

                    <div class="col-lg-2 col-md-3 col-sm-4 col-xs-12">
                        <label class="col-lg-12 col-form-label" for="origin">Origem</label>
                    </div>
                    <div class="col-lg-10 col-md-9 col-sm-8 col-xs-12" style="margin-bottom:20px">
                        <input type="text" class="form-control col-lg-12" id="origin" name="origin" placeholder="Ex: Sao Paulo" value="">
                    </div>

                    <div class="col-lg-2 col-md-3 col-sm-4 col-xs-12">
                        <label class="col-lg-12 col-form-label" for="destination">Destino</label>
                    </div>
                    <div class="col-lg-10 col-md-9 col-sm-8 col-xs-12" style="margin-bottom:20px">
                        <input type="text" class="form-control col-lg-12" id="destination" name="destination" placeholder="Ex: Destino" value="">
                    </div>

                    <div class="col-lg-2 col-md-3 col-sm-4 col-xs-12">
                        <label class="col-lg-12 col-form-label" for="luggage">Bagagem</label>
                    </div>
                    <div class="col-lg-10 col-md-9 col-sm-8 col-xs-12" style="margin-bottom:20px">
                        <input type="text" class="form-control col-lg-12" id="luggage" name="luggage" placeholder="Ex: Bagagem" value="">
                    </div>

                    <div class="col-lg-2 col-md-3 col-sm-4 col-xs-12">
                        <label class="col-lg-12 col-form-label" for="stops">Paradas</label>
                    </div>
                    <div class="col-lg-10 col-md-9 col-sm-8 col-xs-12" style="margin-bottom:20px">
                        <input type="text" class="form-control col-lg-12" id="stops" name="stops" placeholder="Ex: 0" value="">
                    </div>

                    <div class="col-lg-2 col-md-3 col-sm-4 col-xs-12">
                        <label class="col-lg-12 col-form-label" for="currency">Moeda</label>         
                    </div>
                    <div class="col-lg-10 col-md-9 col-sm-8 col-xs-12" style="margin-bottom:20px">
                        <input id="autocomplete_currency" type="text" name="currency" placeholder="Moeda">
                    </div>
                    <div class="col-lg-2 col-md-3 col-sm-4 col-xs-12">
                        <label class="col-lg-12 col-form-label" for="exchange">Cotacao</label>
                    </div>
                    <div class="col-lg-10 col-md-9 col-sm-8 col-xs-12" style="margin-bottom:20px">
                        <input type="text" class="form-control col-lg-12" id="exchange" name="exchange" placeholder="Ex: Cotacao" value="">
                    </div>

                    <div class="col-lg-2 col-md-3 col-sm-4 col-xs-12">
                        <label class="col-lg-12 col-form-label" for="original_cost">Custo Original</label>
                    </div>
                    <div class="col-lg-10 col-md-9 col-sm-8 col-xs-12" style="margin-bottom:20px">
                        <input type="text" class="form-control col-lg-12" id="original_cost" name="original_cost" placeholder="Ex: Custo Original" value="">
                    </div>

                    <div class="col-lg-2 col-md-3 col-sm-4 col-xs-12">
                        <label class="col-lg-12 col-form-label" for="tax">Taxa de Embarque</label>
                    </div>
                    <div class="col-lg-10 col-md-9 col-sm-8 col-xs-12" style="margin-bottom:20px">
                        <input type="text" class="form-control col-lg-12" id="tax" name="tax" placeholder="Ex: Taxa de Embarque" value="">
                    </div>

                    <div class="col-lg-2 col-md-3 col-sm-4 col-xs-12">
                        <label class="col-lg-12 col-form-label" for="rav">RAV</label>
                    </div>
                    <div class="col-lg-10 col-md-9 col-sm-8 col-xs-12" style="margin-bottom:20px">
                        <input type="text" class="form-control col-lg-12" id="rav" name="rav" placeholder="Ex: 100" value="">
                    </div>
                    
                    <div class="col-lg-10 col-md-9 col-sm-8 col-xs-12" style="margin-bottom:20px">
                        <input type="hidden" name="quote_id" value="<?php echo $quote[0]['id'] ?>" />
                    </div>
                <?php endif; ?>
                    <div class="col-lg-12 text-center">
                    <!-- TODO: enable button only if values have changed -->
                        <button type="submit" class="btn btn-info col-lg-12 col-md-12 col-xs-12 col-sm-12">Atualizar</button>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>
