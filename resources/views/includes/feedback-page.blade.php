<div class="feedback-page_container">
    <div class="feedback-page_content">
        <div class="header-block">
            <div class="head-block-title">
                <div class="title-name">
                    <h1>
                        Зворотній зв'язок
                    </h1>
                </div>
            </div>
        </div>
        <form action="{{ route('feedback') }}" method="POST">
            @csrf
            <div class="form-box">
                <div class="enter-block">
                    <div class="title">
                        Як ми можемо до Вас звертатись?
                    </div>
                    <div class="block-items">
                        <input type="text" placeholder="Ваше ім`я" name="client_name">
                    </div>
                </div>
                <div class="enter-block">
                    <div class="title">
                        Контактні данні
                    </div>
                    <div class="block-items">
                        <input type="text" placeholder="Номер телефону" name="feedback_client">
                    </div>
                </div>
                <div class="enter-block">
                    <div class="title">
                        Коментар
                    </div>
                    <div class="block-items">
                        <input type="text" placeholder="Вкажіть в якому стані Ваші речі" name="comment">
                    </div>
                </div>
                <div class="enter-block">
                    <button type="submit">
                        <div class="btn-feedback-block">
                            <span>
                                Відправити
                            </span>
                        </div>
                    </button>
                </div>
            </div>
            @error('feedback_client')
                <span class="error">- Введіть контактні данні!</span>
            @enderror
            <input type="hidden" value="Хімчистка - {{ $content }} \ Сторінка послуги" name="service_type">
        </form>
    </div>
</div>