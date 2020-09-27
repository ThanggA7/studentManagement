.model small
.stack 100h
.data 
str1 db 100 DUP('$')
xd    db 13,10,'$'
str2 db 100 DUP('$')
.code
   main proc
    mov ax,@data
    mov ds ,ax
    mov es,ax
    
    mov ah,0ah
    lea dx,str1
    int 21h
    
    lea dx,xd
    mov ah,9
    int 21h
     
    lea dx,str1+2
    int 21h         
    
    lea dx,xd
    mov ah,9
    int 21h 
    
    lea si,str1+2
    lea di,str2
    cld;
    xor cx,cx
    mov cl,str1 +1;
  
    chuyendoi:
    cmp [si],'a'
    jl NO
    cmp [si],'z'
    jg NO
    sub [si],20h
    NO:
    
    movsb
    loop chuyendoi 
    
    lea dx,str2;
    mov ah,9
    int 21h
     
    mov ah,4ch
    int 21h
    
    main endp
    end main;    
   


