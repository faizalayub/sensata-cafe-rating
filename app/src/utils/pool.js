export default async function({ timetravel = 2500, onValidate, onSuccess }){
    const resolver = async (resolve, reject) => {
        try{ 
            const result = await onSuccess();
            const valid = onValidate(result);

            if(valid === true){
                resolve(result);
            }else if(valid === false){
                setTimeout(resolver, timetravel, resolve, reject);
            }
        }catch(e){
            reject(e);
        }
    };
    return new Promise(resolver);
}