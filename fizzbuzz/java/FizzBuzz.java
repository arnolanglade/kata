class Assert {
    public static void equal(String actual, String expected) throws Exception {
        if (!expected.equals(actual)) {
            throw new Exception(String.format("The given result '%s' does not match '%s'", actual, expected));
        }
    }
}

/**
 * Say Fizz if the number is divided by 3
 */
class Fizz {
    private Integer number;
    private static final String FIZZ = "Fizz";

    public Fizz(Integer number) {
        this.number = number;
    }

    public String toString() {
        return 0 == number%3 ? FIZZ : "";
    }
}

/**
 * Say Buzz if the number is divided by 5
 */
class Buzz {
    private Integer number;
    private static final String BUZZ = "Buzz";

    public Buzz(Integer number) {
        this.number = number;
    }

    public String toString() {
        return 0 == number%5 ? BUZZ : "";
    }
}

/**
 * Say Fizz, Buzz or FizzBuzz
 */
class FizzBuzz {
    private Integer start;
    private Integer end;

    public FizzBuzz(Integer start, Integer end) {
        this.start = start;
        this.end = end;
    }

    public String toString() {
        String result = "";
        for (Integer i = start; i <= end; i++) {
            String fizzBuzz = new Fizz(i).toString() + new Buzz(i).toString();

            result = !fizzBuzz.isEmpty() ? result + fizzBuzz : result + i.toString();
            result = result + "\n";
        }

        return result;
    }
}

class Main {
    public static void main(String[] args) {
        try {
            Assert.equal(new Fizz(1).toString(), "");
            Assert.equal(new Fizz(3).toString(), "Fizz");

            Assert.equal(new Buzz(1).toString(), "");
            Assert.equal(new Buzz(5).toString(), "Buzz");

            Integer start = 1;
            Integer end = 15;
            FizzBuzz fizzBuzz = new FizzBuzz(start, end);

            Assert.equal(
                    fizzBuzz.toString(),
                    "1\n2\nFizz\n4\nBuzz\nFizz\n7\n8\nFizz\nBuzz\n11\nFizz\n13\n14\nFizzBuzz\n"
            );

            System.out.println(fizzBuzz.toString());
        } catch (Exception e) {
            System.out.println("An error occurs:");
            System.out.println(e.getMessage());
        }
    }
}

