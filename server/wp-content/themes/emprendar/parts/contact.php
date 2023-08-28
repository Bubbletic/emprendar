<section class="section-wrapper" id="contact">
    <div class="section-content container">
        <div class="section-content__info">
            <h3 class="section-content__info--title">CONTACT SECTION</h3>
            <p class="section-content__info--text">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. At veniam
                vel commodi cupiditate. Omnis magnam quo a ut labore voluptatibus
                eaque esse cum ad eveniet veritatis architecto dicta, atque odit.
            </p>
        </div>

        <div class="another-content">
            <form class="contact-form">
                <!-- Input name -->
                <div class="contact-form__input-wrapper">
                    <input name="contact-name" class="contact-form__input" type="text" spellcheck="false" autocomplete="off" />
                    <label class="contact-form__label">Nombre *</label>
                </div>

                <!-- Input email -->
                <div class="contact-form__input-wrapper">
                    <input name="contact-email" class="contact-form__input" type="text" spellcheck="false" autocomplete="off" />
                    <label class="contact-form__label">Email *</label>
                </div>

                <!-- Input service -->
                <div class="contact-form__input-wrapper">
                    <input id="dropdownInput" name="contact-service" type="text" readonly class="contact-form__input" autocomplete="off" />
                    <label class="contact-form__label">Servicio *</label>
                    <ul class="dropdown-list">
                        <li class="dropdown-item">Opción 1</li>
                        <li class="dropdown-item">Opción 2</li>
                        <li class="dropdown-item">Opción 3</li>
                    </ul>
                </div>

                <!-- Input message -->
                <div class="contact-form__input-wrapper">
                    <textarea name="contact-message" class="contact-form__input contact-form__input--textarea" type="text" spellcheck="false"></textarea>
                    <label class="contact-form__label contact-form__label--textarea">Mensaje</label>
                </div>
                <button class="contact-form__button" ype="submit">Enviar</button>
            </form>
        </div>
    </div>
</section>