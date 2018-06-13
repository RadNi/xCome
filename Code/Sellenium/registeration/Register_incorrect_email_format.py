import unittest
from selenium import webdriver
from test_utility import static_data, fields


class Register(unittest.TestCase):

    def setUp(self):
        self.driver = webdriver.Firefox()

    def test_email_incorrect_format(self):
        driver = self.driver
        driver.get(static_data.base_url + "register")
        fields.get_components_by_name(driver, ["name=smjfas", "family=feyzabadisani", "email=smjfmail.com",
                                               "person_id=1234565987", "username=smjfas", "password=hello123",
                                               "repass=hello123", "cellphone=09398604014",
                                               "address=21st number baker st.", "captcha=1234", "submit"])[10].click()
        assert driver.find_element_by_id("inValid") is not None

    def tearDown(self):
        self.driver.close()


if __name__ == "__main__":
    unittest.main()
