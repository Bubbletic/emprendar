<section class="section-wrapper" id="contact">
    <div class="section-content container">
        <div class="section-content__info">
            <h3 class="section-content__info--title">TRABAJEMOS JUNTOS</h3>
            <p class="section-content__info--text">
                En nuestra búsqueda constante por apoyar a emprendedores y startups como la tuya, ofrecemos una amplia gama de servicios clave. 
            </p>
            <p class="section-content__info--text">
                Completando nuestro formulario, podrás compartir tus ideas y desafíos con nosotros.
            </p>
            <p class="section-content__info--text">
                En menos de 24 horas, un miembro de nuestro equipo se pondrá en contacto contigo para trabajar juntos en hacer realidad tus proyectos y desafiar tus hipótesis.<br>
            </p>
            <p class="section-content__info--text">Entendemos los obstáculos que enfrentas al emprender y llevar un producto al mercado, por eso estamos aquí para colaborar contigo en cada paso del camino.<br>
                ¡Esperamos recibir tus ideas y empezar a trabajar en ellas de inmediato!
            </p>
        </div>

        <div class="another-content">
            <form class="contact-form" action="https://formsubmit.co/rojasadrian.e@gmail.com" method="POST">
                <input type="hidden" name="_captcha" value="false">
                <!-- Input name -->
                <div class="contact-form__input-wrapper">
                    <input name="name" class="contact-form__input" type="text" spellcheck="false" autocomplete="off" />
                    <label class="contact-form__label">Nombre *</label>
                </div>

                <!-- Input email -->
                <div class="contact-form__input-wrapper">
                    <input name="email" class="contact-form__input" type="text" spellcheck="false" autocomplete="off" />
                    <label class="contact-form__label">Email *</label>
                </div>

                <!-- Input service -->
                <div class="contact-form__input-wrapper">
                    <input id="dropdownInput" name="service" type="text" readonly class="contact-form__input" autocomplete="off" />
                    <label class="contact-form__label">Servicio *</label>
                    <ul class="dropdown-list">
                        <li class="dropdown-item">Contenido Audiovisual</li>
                        <li class="dropdown-item">Ventas B2B</li>
                        <li class="dropdown-item">Marketing Digital</li>
                        <li class="dropdown-item">Desarrollo de Software</li>
                    </ul>
                </div>

                <!-- Input message -->
                <div class="contact-form__input-wrapper">
                    <textarea name="contact-message" class="contact-form__input contact-form__input--textarea" type="text" spellcheck="false"></textarea>
                    <label class="contact-form__label contact-form__label--textarea">Mensaje</label>
                </div>
                <button type="submit" class="contact-form__button">Enviar</button>
            </form>
        </div>
    </div>
</section>