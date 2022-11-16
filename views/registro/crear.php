<main class="registro">
    <h2 class="registro__heading"><?php echo $titulo; ?></h2>
    <p class="registro__descripcion">Elige tú plan</p>

    <div class="paquetes__grid">
        <div class="paquete">
            <h3 class="paquete__nombre">Pase gratis</h3>
            <ul class="paquete__lista">
                <li class="paquete__elemento">Acceso virtual a DevWebCamp</li>
            </ul>
            <p class="paquete__precio">$0.00</p>

            <form method="POST" action="/finalizar-registro/gratis">
                <input class="paquetes__submit" type="submit" value="Inscripción gratis">
            </form>
        </div>

        <div class="paquete">
            <h3 class="paquete__nombre">Pase presencial</h3>
            <ul class="paquete__lista">
                <li class="paquete__elemento">Acceso presencial a DevWebCamp</li>
                <li class="paquete__elemento">Pase por 2 días</li>
                <li class="paquete__elemento">Acceso a talleres y conferencias</li>
                <li class="paquete__elemento">Acceso a grabaciones</li>
                <li class="paquete__elemento">Camisa del evento</li>
                <li class="paquete__elemento">Comida y bebida</li>
            </ul>
            <p class="paquete__precio">$199.00</p>

            <!-- Código para mostrar el botón de PayPal
            <div id="smart-button-container">
                <div style="text-aling: center;">
                    <div id="paypal-button-container"></div>
                </div>    
            </div> -->

            <form method="POST" action="/finalizar-registro/pagar">
                <input class="paquetes__submit" type="submit" value="Comprar pase">
            </form>
        </div>

        <div class="paquete">
            <h3 class="paquete__nombre">Pase virtual</h3>
            <ul class="paquete__lista">
                <li class="paquete__elemento">Acceso virtual a DevWebCamp</li>
                <li class="paquete__elemento">Pase por 2 días</li>
                <li class="paquete__elemento">Enlace a talleres y conferencias</li>
                <li class="paquete__elemento">Acceso a grabaciones</li>
            </ul>
            <p class="paquete__precio">$49.00</p>

            <form method="POST" action="/finalizar-registro/pagar">
                <input class="paquetes__submit" type="submit" value="Comprar pase">
            </form>
        </div>
    </div>
</main>


<!-- Código JS para las funciones de pago PayPal
    <script src="https://www.paypal.com/sdk/js?client-id=Adc6YGqAfmtD_7WCDB9mf3AidMfM18ZQr49mGkIHEOF8XuFTW7aAMuB09wVfMblablablabla" data-sdk-integration-source="button-factory"></script>
    <script>
        function initPayPalButton() {
            paypal.Buttons({
                style: {
                    shape: 'rect',
                    color: 'blue',
                    layout: 'vertical',
                    label: 'pay',
                },

                createORder: function(data, actions) {
                    return actions.order.create({
                        purchase_units: [{"description": "1", "amount": {"currency_code":"USD", "value":199}}]
                    });
                },

<<<<<<<<<<<<<<< ELIMINAR ESTE CÓDIGO, YA QUE SE VA A MODIFICAR PARA HACERLO PERSONALIZADO>>
                onApprove: function(data, actions) {
                    return action.order.capture().then(function(orderData) {
                        //Full available details
                        console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));

                        //Show a success message within this page e.g.
                        const element = document.getElementById('paypal-button-container');
                        element.innerHTML = '';
                        element.innerHTML = '<h3>Thank you for your payment!</h3>';
                    

                    });
                },

                //Or go to another URL:     actions.redirect('thank_you.html');

<<<<<<<<<<<<<<<< ELIMINAR ESTE CÓDIGO, YA QUE SE VA A MODIFICAR PARA HACERLO PERSONALIZADO>>

<<<<<<<<<<<<<<< AGREGAR ESTE CÓDIGO EN CAMBIO>>
                onApprove: function(data, actions) {
                    return actions.order.capture().then(function(orderData) {

                        const datos = new FormData();
                        datos.append('paquete_id', orderData.purchase_units[0].descripcion);
                        datos.append('pago_id', orderData.purchase_units[0].payments.captures[0].id);

                        fetch('/finalizar-registro/pagar', {
                            method: 'POST',
                            body: datos
                        })
                        .then( respuesta => respuesta.json())
                        .then(resultado => {
                            if(resultado.resultado) {
                                actions.redirect('http://localhost:3000/finalizar-registro/conferencias');
                            }
                        });
                    });
                },

                onError: function(err) {
                    console.log(err);
                }
            }).render('#paypal-button-container');
        }
        initPayPalButton();
    </script>
-->