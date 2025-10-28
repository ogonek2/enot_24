<div class="window-feedback-model wn-ct">
    <div class="model-content">
        <div class="hide_fd_w">
            <i class="fa-solid fa-xmark"></i>
        </div>
        <div class="head-block">
            <h1>Зворотній зв'язок</h1>
            <p>
                Ми зв'яжимось з вами!
            </p>
        </div>
        <div class="form-box">
            <form action="{{ route('feedback') }}" method="POST">
                @csrf
                <div class="form-body">
                    <div class="form-group">
                        <label for="name_w_f">Як ми можемо до Вас звертатись?</label>
                        <input type="text" name="client_name" id="name_w_f" placeholder="Ваше ім`я" required>
                    </div>
                    <div class="form-group">
                        <label for="phone_w_f">Контактні данні</label>
                        <input type="text" name="feedback_client" id="phone_w_f" placeholder="+380 (__)___-____" required>
                    </div>
                    <input type="hidden" name="data_f_w" id="data_f_w_val" value="">
                </div>
                <div class="form-footer">
                    <div class="form-group">
                        <input type="checkbox" id="check_w_f_phone">
                        <label for="check_w_f_phone" required>
                            Підтверджую що номер вірний та даю згоду на збір та обробку данних
                        </label>
                    </div>
                    <button id="sb_w_f_validate" disabled>
                        Відправити
                    </button>
                </div>
            </form>
        </div>
    </div>
    <div class="overlay"></div>
</div>
