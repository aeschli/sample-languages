  if ! fnExists "platform_${__platform}"; then
        fatalError "Set the __platform variable: $(compgen -A function platform_ | cut -b10- | paste -s -d' ')"
    fi