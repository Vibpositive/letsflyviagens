<div class="col-lg-12">
    <div class="card card-outline-primary">

        <div class="card-body">
            <div class="form-validation">
                <?php if( isset($quote_response_cost[0]) && array_key_exists(0, $quote_response_cost)) : ?>
					<?php echo form_open(base_url() . 'admin/quotes/update', "class='form-valide'");?>
					<div class="form-group row">
                    <?php foreach ($quote_response_cost[0] as $key => $value) : ?>
                        <?php if ($key !== "quote_answer_cost_id" && $key !== "id" && $key !== "quote_id" && $key !== "total" && $key !== "cost") : ?>
                            <div class="col-lg-2">
                                <label class="col-lg-12 col-form-label" for="<?php echo $key; ?>"><?php echo $key; ?></label>
                            </div>
                            <div class="col-lg-10" style="margin-bottom:20px">
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
                                	id="id"
                                    name="id"
                                    value="<?php echo $value;?>">
                        <?php elseif ($key === "total") :?>
                                <div class="col-lg-2">
                                   <label class="col-lg-12 col-form-label" for="<?php echo $key; ?>"><?php echo $key; ?></label>
                               </div>
                               <div class="col-lg-10" style="margin-bottom:20px">
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
					<?php echo form_open(base_url() . 'admin/quotes/response', "class='form-valide'");?>
					<div class="form-group row">
                    <div class="col-lg-2">
                        <label class="col-lg-12 col-form-label" for="localizador">Localizador</label>
                    </div>
                    <div class="col-lg-10" style="margin-bottom:20px">
                        <input
							type="text"
							class="form-control col-lg-12"
							id="localizador"
							name="localizador"
							placeholder="Ex: Localizador"
							value="<?php echo $this->session->flashdata('forminput')['localizador']; ?>">
                    </div>

                    <div class="col-lg-2">
                        <label class="col-lg-12 col-form-label" for="airline">Cia Aerea</label>
                    </div>
                    <div class="col-lg-10" style="margin-bottom:20px">
                        <input
							type="text"
							class="form-control col-lg-12"
							id="airline"
							name="airline"
							placeholder="Ex: Cia Aerea"
							value="<?php echo $this->session->flashdata('forminput')['airline']; ?>">
                    </div>

                    <div class="col-lg-2">
                        <label class="col-lg-12 col-form-label" for="flight">Voo</label>
                    </div>
                    <div class="col-lg-10" style="margin-bottom:20px">
                        <input
							type="text"
							class="form-control col-lg-12"
							id="flight"
							name="flight"
							placeholder="Ex: Voo"
							value="<?php echo $this->session->flashdata('forminput')['flight']; ?>">
                    </div>

                    <div class="col-lg-2">
                        <label class="col-lg-12 col-form-label" for="departure_datetime">Data de Embarque</label>
                    </div>
                    <div class="col-lg-10" style="margin-bottom:20px">
                        <input
							type="date"
							class="form-control col-lg-12 datePicker"
							id="departure_datetime"
							name="departure_datetime"
							placeholder="Ex: 00/00/00000"
							value="<?php echo $this->session->flashdata('forminput')['departure_datetime']; ?>">
                    </div>

                    <div class="col-lg-2">
                        <label class="col-lg-12 col-form-label" for="arrival_datetime">Data de Chegada</label>
                    </div>
                    <div class="col-lg-10" style="margin-bottom:20px">
                        <input
							type="date"
							class="form-control col-lg-12 datePicker"
							id="arrival_datetime"
							name="arrival_datetime"
							placeholder="Ex: 00/00/00000"
							value="<?php echo $this->session->flashdata('forminput')['arrival_datetime']; ?>">
                    </div>

                    <div class="col-lg-2">
                        <label class="col-lg-12 col-form-label" for="class">Classe</label>
                    </div>
                    <div class="col-lg-10" style="margin-bottom:20px">
                        <input
							type="text"
							class="form-control col-lg-12"
							id="class"
							name="class"
							placeholder="Ex: Economica"
							value="<?php echo $this->session->flashdata('forminput')['class']; ?>">
                    </div>

                    <div class="col-lg-2">
                        <label class="col-lg-12 col-form-label" for="origin">Origem</label>
                    </div>
                    <div class="col-lg-10" style="margin-bottom:20px">
                        <input
							type="text"
							class="form-control col-lg-12"
							id="origin"
							name="origin"
							placeholder="Ex: Sao Paulo"
							value="<?php echo $this->session->flashdata('forminput')['origin']; ?>">
                    </div>

                    <div class="col-lg-2">
                        <label class="col-lg-12 col-form-label" for="destination">Destino</label>
                    </div>
                    <div class="col-lg-10" style="margin-bottom:20px">
                        <input
							type="text"
							class="form-control col-lg-12"
							id="destination"
							name="destination"
							placeholder="Ex: Destino"
							value="<?php echo $this->session->flashdata('forminput')['destination']; ?>">
                    </div>

                    <div class="col-lg-2">
                        <label class="col-lg-12 col-form-label" for="luggage">Bagagem</label>
                    </div>
                    <div class="col-lg-10" style="margin-bottom:20px">
                        <input
							type="text"
							class="form-control col-lg-12"
							id="luggage"
							name="luggage"
							placeholder="Ex: Bagagem"
							value="<?php echo $this->session->flashdata('forminput')['luggage']; ?>">
                    </div>

                    <div class="col-lg-2">
                        <label class="col-lg-12 col-form-label" for="stops">Paradas</label>
                    </div>
                    <div class="col-lg-10" style="margin-bottom:20px">
                        <input
							type="text"
							class="form-control col-lg-12"
							id="stops"
							name="stops"
							placeholder="Ex: 0"
							value="<?php echo $this->session->flashdata('forminput')['stops']; ?>">
                    </div>

                    <div class="col-lg-2">
                        <label class="col-lg-12 col-form-label" for="currency">Moeda</label>         
                    </div>
                    <div class="col-lg-10" style="margin-bottom:20px">
                        <input
							type="text"
							class="form-control col-lg-12"
							id="autocomplete_currency"
							name="currency"
							placeholder="Moeda"
							value="<?php echo $this->session->flashdata('forminput')['currency']; ?>">
                    </div>
                    <div class="col-lg-2">
                        <label class="col-lg-12 col-form-label" for="exchange">Cotacao</label>
                    </div>
                    <div class="col-lg-10" style="margin-bottom:20px">
                        <input
							type="number"
							class="form-control col-lg-12"
							id="exchange" name="exchange"
							name="exchange"
							placeholder="Ex: Cotacao"
							value="<?php echo $this->session->flashdata('forminput')['exchange']; ?>"
							step="0.01">
                    </div>

                    <div class="col-lg-2">
                        <label class="col-lg-12 col-form-label" for="original_cost">Custo Original</label>
                    </div>
                    <div class="col-lg-10" style="margin-bottom:20px">
                        <input
							type="number" 
							class="form-control col-lg-12"
							id="original_cost"
							name="original_cost"
							placeholder="Ex: Custo Original"
							value="<?php echo $this->session->flashdata('forminput')['original_cost']; ?>"
							step="0.01">
                    </div>

                    <div class="col-lg-2">
                        <label class="col-lg-12 col-form-label" for="tax">Taxa de Embarque</label>
                    </div>
                    <div class="col-lg-10" style="margin-bottom:20px">
                        <input
							type="number"
							class="form-control col-lg-12"
							id="tax"
							name="tax"
							placeholder="Ex: Taxa de Embarque"
							value="<?php echo $this->session->flashdata('forminput')['tax']; ?>"
							step="0.01">
                    </div>

                    <div class="col-lg-2">
                        <label class="col-lg-12 col-form-label" for="rav">RAV</label>
                    </div>
                    <div class="col-lg-10" style="margin-bottom:20px">
                        <input
							type="number"
							step="0.01"class="form-control col-lg-12"
							id="rav"
							name="rav"
							placeholder="Ex: 100"
							value="<?php echo $this->session->flashdata('forminput')['rav']; ?>">
                    </div>
                    
                    <div class="col-lg-10" style="margin-bottom:20px">
					<input type="hidden" name="id" value="<?php echo $quote[0]['id'] ?>" />
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
