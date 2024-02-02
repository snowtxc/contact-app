export const useUtils = () => {
    
    const fileToB64 = (file:File)=>{
        return new Promise((resolve,reject)=>{
            const reader = new FileReader();
            reader.readAsDataURL(file);
            reader.onload = function () {
                resolve(reader.result);
            };
            reader.onerror = function (error) {
                reject("error");
            };
        })
    }

    const shortText = (text:string,maxLong: number) =>{
        if (text.length > maxLong) {
            return text.slice(0, maxLong) + '...';
        } else {
            return text;
        }
    }

    return { fileToB64 , shortText}
    
}