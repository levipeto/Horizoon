
<script defer src="{{ asset('js/card_dateValidation.js') }}"></script>

<div class="w-full h-full p-4 adaptable:p-0 bg-gray-100">
<form action="{{ route('add_card') }}" method="POST">
@csrf
<div class="w-full h-full mt-8 adaptable:p-4">
    <div class="w-full mx-auto text-gray-700" style="max-width: 600px">
        <div class="mb-10">
            <h1 class="text-center font-bold text-xl uppercase">Add your cart</h1>
        </div>
        <div class="mb-3 flex -mx-2">
            <div class="px-2">
                <label for="type1" class="flex items-center cursor-pointer">
                    <input type="radio" class="form-radio h-5 w-5 text-indigo-500" name="type" id="type1" checked>
                    <img src="https://leadershipmemphis.org/wp-content/uploads/2020/08/780370.png" class="h-8 ml-3">
                </label>
            </div>
            <div class="px-2">
                <label for="type2" class="flex items-center cursor-pointer">
                    <input type="radio" class="form-radio h-5 w-5 text-indigo-500" name="type" id="type2">
                    <img src="https://www.sketchappsources.com/resources/source-image/PayPalCard.png" class="h-8 ml-3">
                </label>
            </div>
        </div>
        <div class="mb-3">
            <div>
                <input name="owner_card" class="name-card-user w-full px-3 py-2 mb-1 border-2 border-gray-200 rounded-md focus:outline-none
               focus:border-indigo-500 transition-colors" placeholder="Card owner..." type="text"/>     
                @error('owner_card')
                <span role="alert" class="text-red-600 p-2 pb-2 justify-center items-center">
                    <strong>{{ $message }} !</strong>
                </span>    
                @enderror
            </div>
        </div>
        <div class="mb-3">
            <div>
                <input name="number_card" type="text" inputmode="numeric" pattern="[0-9\s]{13,19}" class="number-card-user w-full px-3 py-2 mb-1 border-2 border-gray-200 rounded-md focus:outline-none focus:border-indigo-500 transition-colors" placeholder="0000 0000 0000 0000"/>
                @error('number_card')
                <span role="alert" class="text-red-600 p-2 pb-2 justify-center items-center">
                    <strong>{{ $message }}</strong>
                </span>    
                @enderror
            </div>
        </div>
        <div class="mb-3 -mx-2 flex items-end">
            <div class="px-2 w-1/2">
                <div>
                    <select name="month" class="month form-select w-full px-3 py-2 mb-1 border-2 border-gray-200 rounded-md focus:outline-none focus:border-indigo-500 transition-colors cursor-pointer">
                        <option value="01">01 - January</option>
                        <option value="02">02 - February</option>
                        <option value="03">03 - March</option>
                        <option value="04">04 - April</option>
                        <option value="05">05 - May</option>
                        <option value="06">06 - June</option>
                        <option value="07">07 - July</option>
                        <option value="08">08 - August</option>
                        <option value="09">09 - September</option>
                        <option value="10">10 - October</option>
                        <option value="11">11 - November</option>
                        <option value="12">12 - December</option>
                    </select>
                </div>
            </div>
            <div class="px-2 w-1/2">
                <select name="year" class="year form-select w-full px-3 py-2 mb-1 border-2 border-gray-200 rounded-md focus:outline-none focus:border-indigo-500 transition-colors cursor-pointer">
                    <option value="2020">2020</option>
                    <option value="2021">2021</option>
                    <option value="2022">2022</option>
                    <option value="2023">2023</option>
                    <option value="2024">2024</option>
                    <option value="2025">2025</option>
                    <option value="2026">2026</option>
                    <option value="2027">2027</option>
                    <option value="2028">2028</option>
                    <option value="2029">2029</option>
                </select>
            </div>
        </div>
        <div class="mb-10">
            <div>
                <input name="code_card" class="code-card w-32 px-3 py-2 mb-1 border-2 border-gray-200 rounded-md focus:outline-none focus:border-indigo-500 transition-colors" placeholder="000" type="text"/>
                @error('code_card')
                <span role="alert" class="text-red-600 p-2 pb-2 justify-center items-center">
                    <strong>{{ $message }}</strong>
                </span>    
                @enderror
            </div>
        </div>
        <div>
            <button name="add_card" class="add-card block w-full max-w-xs mx-auto bg-gray-700 hover:bg-yellow-500 focus:bg-gray-700 text-white rounded-lg px-3 py-3 font-semibold"><i class="mdi mdi-lock-outline mr-1"></i> 
            ADD CARD</button>
        </div>
    </div>
</div>
</form>
</div>

</body>
</html>