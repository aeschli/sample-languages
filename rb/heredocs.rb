expected_result = <<HEREDOC
This would contain specially formatted text.

That might span many lines
HEREDOC

  expected_result = <<-INDENTED_HEREDOC
This would contain specially formatted text.

That might span many lines
  INDENTED_HEREDOC
  
  expected_result = <<'EXPECTED'
One plus one is #{1 + 1}
EXPECTED

p expected_result # prints: "One plus one is \#{1 + 1}\n"

<<-`MESSAGE`
  hostname
  whoami
MESSAGE
# => "happycat\narne\n"