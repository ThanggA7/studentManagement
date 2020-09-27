.model small
.stack 100h
.data
str db 100 DUP('$')
hang db 10
.code
    main proc
        mov ax,@data
        mov ds,ax
        
        mov ah,0ah
        lea dx,str
        int 21h
        
        xor ax,ax
        xor bx,bx 
        xor cx,cx
        lea si,str
        inc si
        mov cl,[si]
        inc si
        So:
        mov bl,[si]
        sub bl,30h
        mul hang
        add al,bl
        inc si
        loop So
        
       xor cx,cx
       mov cl,al
       mov al,1
       
       tinhgiaithua:
       mul cx
       loop tinhgiaithua
       
       xor bx,bx
       xor dx,dx
       xor cx,cx
       mov bl,10
       
       hienthi1:
       div bl
       mov dl,ah
       push dx
       xor ah,ah
       inc cl
       cmp al,0
       jne hienthi1
       
       hienthi2:
       pop dx
       add dl,30h
       mov ah,2
       int 21h
       loop hienthi2
       
        
        
    endp main
    end main



