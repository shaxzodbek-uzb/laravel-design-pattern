class UserRepository {

    public function getById($id){
        return User::find($id);
    }

    public function getByPhone($phone){
        <!-- return User::where('phone', $phone)->first(); -->
        
        <!-- 1 -->
        <!-- api request -->
        <!-- return $response; -->

        <!-- 2 -->
        <!-- mysql - baza o'zgardi -->
        <!-- return DB::connection('mysql')->table('users')->where('phone', $phone)->first(); -->
    }
}